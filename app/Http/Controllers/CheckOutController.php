<?php

namespace App\Http\Controllers;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    // Tampilkan halaman checkout
    public function checkout()
    {
        // Ambil data keranjang dari session
        $cartItems = Cart::with('product')
        ->where('user_id', Auth::id())
        ->get();

        if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Keranjang kamu kosong!');
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kamu kosong!');
        }

        return view('pages.pembeli.checkout', compact('cartItems'));
    }

    // Tampilkan halaman detail setelah checkout
    public function checkoutdetail()
    {
        
         $cart = session('checkout.items', []); 

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

    // Tambah item ke keranjang (session)
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'product' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|string',
        ]);

        $cart = session()->get('components.cart', []);

        $cart[] = [
            'product_id' => $validated['product_id'],
            'product' => $validated['product'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'image' => $validated['image'],
        ];

        session(['components.cart' => $cart]);

        return redirect()->route('pages.pembeli.checkout')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Proses submit checkout
    public function checkoutSubmit(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $cart = session('components.cart', []);

        if (empty($cart)) {
            return redirect()->route('checkoutdetail')->with('error', 'Keranjang kosong, tidak bisa checkout.');
        }

        session([
            'checkout.email' => $validated['email'],
            'checkout.first_name' => $validated['first_name'],
            'checkout.last_name' => $validated['last_name'],
            'checkout.address' => $validated['address'],
            'checkout.phone' => $validated['phone'],
            'checkout.notes' => $validated['notes'] ?? '',
        ]);

        try {
            // Hitung total
            $total = collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });

            // Buat order
            $order = Order::create([
                'user_id' => Auth::id(),
                'grand_total' => $total,
                'payment_method' => 'COD',
                'payment_status' => 'pending',
                'status' => 'new',
                'currency' => 'IDR',
                'shipping_amount' => 0,
                'shipping_method' => 'standard',
                'notes' => $validated['notes'] ?? '',
            ]);

            // Simpan semua item
            foreach ($cart as $item) {
                $order->items()->create([
                    'product_name' => $item['product'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'total' => $item['price'] * $item['quantity'],
                ]);
            }

            
            session([
            'checkout.email' => $validated['email'],
            'checkout.first_name' => $validated['first_name'],
            'checkout.last_name' => $validated['last_name'],
            'checkout.address' => $validated['address'],
            'checkout.phone' => $validated['phone'],
            'checkout.notes' => $validated['notes'] ?? '',
            'checkout.items' => $cart, // SIMPAN DI SINI
            ]);
            
            // Bersihkan keranjang session
            session()->forget('components.cart');

            return redirect()->route('checkoutdetail')->with('success', 'Checkout berhasil!');
        } catch (\Exception $e) {
            return redirect()->route('pages.pembeli.checkout')->with('error', 'Terjadi kesalahan saat checkout.');
        }
    }

    public function proceedToCheckout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return redirect()->route('pages.pembeli.checkout');
    }
}
