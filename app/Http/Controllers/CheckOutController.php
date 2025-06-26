<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckOutController extends Controller
{
    /**
     * Step 1: Dari Cart ke Checkout Form
     * Route: /checkout - Menampilkan form checkout
     */
    public function checkout(Request $request)
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.show')->with('error', 'Keranjang kamu kosong!');
    }

    // Prepare checkout items untuk session
    $checkoutItems = $cartItems->map(function($item) {
        $images = is_array($item->product->images) ? $item->product->images : json_decode($item->product->images, true);
        $firstImage = !empty($images) ? $images[0] : null;

        return [
            'product_id' => $item->product->id,
            'product' => $item->product->name,
            'price' => $item->product->price,
            'quantity' => $item->quantity,
            'image' => $firstImage,
        ];
    })->toArray();

    $user = Auth::user();

    // Simpan data ke session TANPA first_name dan last_name
    session()->put([
        'checkout.items' => $checkoutItems,
        'checkout.email' => $user->email ?? '',
        'checkout.address' => $user->address ?? '',
        'checkout.phone' => $user->phone ?? '',
        'checkout.notes' => '',
        'checkout_from_cart' => true,
    ]);

    return view('pages.pembeli.checkout', [
        'cart' => $checkoutItems,
        'checkoutData' => [
            'email' => session('checkout.email', ''),
            'address' => session('checkout.address', ''),
            'phone' => session('checkout.phone', ''),
            'notes' => session('checkout.notes', ''),
        ]
    ], compact('cartItems'));
}

    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|string',
        ]);

        $cart = session()->get('components.cart', []);

        $cart[] = [
            'product' => $validated['product'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'image' => $validated['image'],
        ];

        session(['components.cart' => $cart]);

        return redirect()->route('pages.pembeli.checkout')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function checkoutSubmit(Request $request)
    {
        Log::info('Checkout Submit - Request Data:', $request->all());

        $validated = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'notes' => 'nullable|string',
        ]);

        // Cek apakah ada items di session
        $cartItems = session('checkout.items', []);
        if (empty($cartItems)) {
            return redirect()->route('cart.show')->with('error', 'Keranjang kosong, tidak bisa checkout.');
        }

        // Update session dengan data form yang baru diisi
        session()->put([
            'checkout.email' => $validated['email'],
            'checkout.first_name' => $validated['first_name'],
            'checkout.last_name' => $validated['last_name'],
            'checkout.address' => $validated['address'],
            'checkout.phone' => $validated['phone'],
            'checkout.notes' => $validated['notes'] ?? '',
        ]);

        Log::info('Checkout Submit - Data updated in session, redirecting to detail');

        // Redirect ke checkout detail (view)
        return redirect()->route('checkoutdetail');
    }

    /**
     * Step 3: Checkout Detail (View) - Menampilkan ringkasan sebelum konfirmasi
     * Route: /checkout/detail
     */
    public function checkoutdetail()
    {
        Log::info('Checkout Detail - Session check:', [
            'session_id' => session()->getId(),
            'has_items' => session()->has('checkout.items'),
            'items' => session('checkout.items', [])
        ]);

        $cart = session('checkout.items', []);

        if (empty($cart)) {
            Log::warning('Checkout detail: No items in session');
            return redirect()->route('cart.show')->with('error', 'Tidak ada item untuk checkout. Silakan tambahkan produk ke keranjang.');
        }

        $checkoutData = [
            'email' => session('checkout.email', ''),
            'first_name' => session('checkout.first_name', ''),
            'last_name' => session('checkout.last_name', ''),
            'address' => session('checkout.address', ''),
            'phone' => session('checkout.phone', ''),
            'notes' => session('checkout.notes', ''),
        ];

        Log::info('Checkout Detail - Data prepared:', [
            'cart_items_count' => count($cart),
            'checkout_data' => $checkoutData
        ]);

        // Return view detail checkout (review page)
        return view('pages.pembeli.checkoutdetail', compact('cart', 'checkoutData'));
    }


    public function checkoutConfirm(Request $request)
    {
        Log::info('Checkout Confirm - Processing final order');

        $cartItems = collect(session('checkout.items', []));
        $checkoutData = [
            'email' => session('checkout.email'),
            'first_name' => session('checkout.first_name'),
            'last_name' => session('checkout.last_name'),
            'address' => session('checkout.address'),
            'phone' => session('checkout.phone'),
            'notes' => session('checkout.notes', ''),
        ];

        if ($cartItems->isEmpty() || empty($checkoutData['email'])) {
            return redirect()->route('cart.show')->with('error', 'Data checkout tidak lengkap.');
        }

        try {
            foreach ($cartItems as $item) {
                if (!Product::find($item['product_id'])) {
                    throw new \Exception("Produk dengan ID {$item['product_id']} tidak ditemukan");
                }
            }

            $total = $cartItems->sum(fn($item) => $item['price'] * $item['quantity']);

            Log::info('Creating order with total: ' . $total);

            // Simpan order ke database
            $order = Order::create([
                'user_id' => Auth::id(),
                'email' => $checkoutData['email'],
                'first_name' => $checkoutData['first_name'],
                'last_name' => $checkoutData['last_name'],
                'address' => $checkoutData['address'],
                'phone' => $checkoutData['phone'],
                'notes' => $checkoutData['notes'],
                'total' => $total,
                'status' => 'pending',
                'items' => json_encode($cartItems->toArray())
            ]);

            Log::info('Order created with ID: ' . $order->id);

            // Simpan order items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_amount' => $item['price'],
                    'total_amount' => $item['price'] * $item['quantity'],
                ]);
            }

            if (session('checkout_from_cart', false)) {
                $deletedCount = Cart::where('user_id', Auth::id())->delete();
                Log::info('Deleted cart items: ' . $deletedCount);
            }

            session()->forget([
                'checkout.items',
                'checkout.email',
                'checkout.first_name',
                'checkout.last_name',
                'checkout.address',
                'checkout.phone',
                'checkout.notes',
                'checkout_from_cart'
            ]);

            Log::info('Checkout successful for order: ' . $order->id);

            return redirect()->route('checkout')
                ->with('success', 'Pesanan berhasil dikonfirmasi! Order ID: ' . $order->id);

        } catch (\Exception $e) {
            Log::error('Checkout Confirm Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memproses pesanan: ' . $e->getMessage());
        }
    }



    /**
     * Helper: Proceed to checkout (untuk button di cart)
     */
    public function proceedToCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return redirect()->route('checkout');
    }

    public function showPaymentPage($order_id)
    {
        $order = Order::where('id', $order_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Jika token belum ada (untuk kasus debugging / testing ulang)
        if (!$order->snap_token) {
            $params = [
                'transaction_details' => [
                    'order_id' => $order->id,
                    'gross_amount' => $order->total,
                ],
                'customer_details' => [
                    'first_name' => $order->first_name,
                    'last_name' => $order->last_name,
                    'email' => $order->email,
                    'phone' => $order->phone,
                ],
            ];

            // Ambil Snap Token
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // Simpan Snap Token ke order (opsional)
            $order->update(['snap_token' => $snapToken]);
        } else {
            $snapToken = $order->snap_token;
        }

        return view('pages.pembeli.payment', [
            'order' => $order,
            'snapToken' => $snapToken
        ]);
    }



    public function paymentSuccess(Request $request)
    {
        return view('pages.pembeli.success');
    }
}
