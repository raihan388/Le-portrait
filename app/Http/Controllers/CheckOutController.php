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
            // Untuk testing, isi data dummy agar tidak kosong
            $cartItems = collect([
                ['product' => 'Kamera Canon', 'price' => 1500000, 'quantity' => 1, 'image' => 'canon.jpg'],
                ['product' => 'Lensa Nikon', 'price' => 900000, 'quantity' => 2, 'image' => 'nikon.jpg']
            ]);
            session(['components.cart' => $cartItems->toArray()]);
        }

        return view('pages.pembeli.checkout', compact('cartItems'));
    }

    // Tampilkan halaman detail setelah checkout
    public function checkoutdetail()
    {
        $cart = session('components.cart', []);

        // Ambil data pembeli dari session
        $checkoutData = [
            'email' => session('checkout.email'),
            'first_name' => session('checkout.first_name'),
            'last_name' => session('checkout.last_name'),
            'address' => session('checkout.address'),
            'phone' => session('checkout.phone'),
            'notes' => session('checkout.notes'),
        ];

        return view('pages.pembeli.checkoutdetail', compact('cart', 'checkoutData'));
    }

    // Tambah item ke keranjang
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

    // Submit checkout
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

            return redirect()->route('checkout')
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