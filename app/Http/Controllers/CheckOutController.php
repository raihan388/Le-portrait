<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // Pastikan quantity di cart sesuai dengan yang diinput
    if ($request->has('product_id') && $request->has('quantity')) {
        $productId = $request->product_id;
        $quantity = $request->quantity;
        
        $cartItem = $cartItems->where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->update(['quantity' => $quantity]);
            $cartItem->refresh(); // Refresh data dari database
        }
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

        // Simpan data ke session
        session()->put([
            'checkout.items' => $checkoutItems,
            'checkout.email' => $user->email ?? '',
            'checkout.first_name' => $user->first_name ?? $user->name ?? '',
            'checkout.last_name' => $user->last_name ?? '',
            'checkout.address' => $user->address ?? '',
            'checkout.phone' => $user->phone ?? '',
            'checkout.notes' => '',
            'checkout_from_cart' => true,
        ]);

        \Log::info('Checkout Form - Session saved:', [
            'items_count' => count($checkoutItems),
            'from_cart' => true,
            'session_id' => session()->getId()
        ]);

        // Return view checkout form (bukan redirect)
        return view('pages.pembeli.checkout', [
            'cart' => $checkoutItems,
            'checkoutData' => [
                'email' => session('checkout.email', ''),
                'first_name' => session('checkout.first_name', ''),
                'last_name' => session('checkout.last_name', ''),
                'address' => session('checkout.address', ''),
                'phone' => session('checkout.phone', ''),
                'notes' => session('checkout.notes', ''),
            ]
        ]
        ,compact('cartItems'));
    }

    /**
     * Direct checkout dari detail produk
     */
    /**
 * Direct checkout dari detail produk
 */
public function checkoutDirect(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1'
    ]);

    $product = Product::findOrFail($request->product_id);
    $quantity = max(1, (int) $request->quantity);
    
    // Periksa apakah produk sudah ada di cart
    $existingCartItem = Cart::where('user_id', Auth::id())
                          ->where('product_id', $product->id)
                          ->first();

    // Jika produk sudah ada di cart, update quantity
    if ($existingCartItem) {
        $existingCartItem->update([
            'quantity' => $quantity
        ]);
    } 
    // Jika belum ada, tambahkan ke cart
    else {
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $quantity
        ]);
    }

    // Redirect ke checkout biasa (bukan langsung ke session)
    return redirect()->route('checkout');
}

    /**
     * Step 2: Submit Form Checkout → Update Session → Redirect ke Detail
     * Route: POST /checkout/submit
     */
    public function checkoutSubmit(Request $request)
    {
        \Log::info('Checkout Submit - Request Data:', $request->all());

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

        \Log::info('Checkout Submit - Data updated in session, redirecting to detail');

        // Redirect ke checkout detail (view)
        return redirect()->route('checkoutdetail');
    }

    /**
     * Step 3: Checkout Detail (View) - Menampilkan ringkasan sebelum konfirmasi
     * Route: /checkout/detail
     */
    public function checkoutdetail()
    {
        \Log::info('Checkout Detail - Session check:', [
            'session_id' => session()->getId(),
            'has_items' => session()->has('checkout.items'),
            'items' => session('checkout.items', [])
        ]);

        $cart = session('checkout.items', []);
        
        if (empty($cart)) {
            \Log::warning('Checkout detail: No items in session');
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

        \Log::info('Checkout Detail - Data prepared:', [
            'cart_items_count' => count($cart),
            'checkout_data' => $checkoutData
        ]);

        // Return view detail checkout (review page)
        return view('pages.pembeli.checkoutdetail', compact('cart', 'checkoutData'));
    }

    /**
     * Step 4: Konfirmasi Pesanan - Proses Final Order
     * Route: POST /checkout/confirm
     */
    public function checkoutConfirm(Request $request)
    {
        \Log::info('Checkout Confirm - Processing final order');

        // Ambil data dari session
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
            // Validasi products masih exist
            foreach ($cartItems as $item) {
                $product = Product::find($item['product_id']);
                if (!$product) {
                    throw new \Exception("Produk dengan ID {$item['product_id']} tidak ditemukan");
                }
            }

            // Hitung total
            $total = $cartItems->sum(function($item) {
                return $item['price'] * $item['quantity'];
            });

            \Log::info('Creating order with total: ' . $total);

            // Buat order
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

            \Log::info('Order created with ID: ' . $order->id);

            // Simpan order items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['product'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'total' => $item['price'] * $item['quantity'],
                ]);
            }

            // Hapus cart items jika checkout dari cart
            if (session('checkout_from_cart', false)) {
                $deletedCount = Cart::where('user_id', Auth::id())->delete();
                \Log::info('Deleted cart items: ' . $deletedCount);
            }

            // Hapus session checkout
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

            \Log::info('Checkout successful for order: ' . $order->id);

            return redirect()->route('cart.show')
                ->with('success', 'Pesanan berhasil dikonfirmasi! Order ID: ' . $order->id);

        } catch (\Exception $e) {
            \Log::error('Checkout Confirm Error: ' . $e->getMessage());
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
}