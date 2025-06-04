<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    // Tampilkan halaman checkout
    public function checkout()
    {
        $cart = session('components.cart', []);
        $cartItems = collect($cart);

        // Kalau cart kosong, arahkan ke halaman cart
        if ($cartItems->isEmpty()) {
           // return redirect()->route('cart')->with('error', 'Keranjang kamu kosong.');
        }

        return view('pages.pembeli.checkout', compact('cartItems'));
    }

    // Tambah item ke cart
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|string',
        ]);

        // Ambil cart dari session
        $cart = session()->get('components.cart', []);

        // Tambahkan item baru
        $cart[] = [
            'product' => $validated['product'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'image' => $validated['image'],
        ];

        // Simpan kembali ke session
        session(['components.cart' => $cart]);

        return redirect()->route('pages.pembeli.checkout')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Submit checkout form
    public function checkoutsubmit(Request $request)
    {
        // Validasi form data
        $validated = $request->validate([
            'email'       => 'required|email',
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'address'     => 'required|string|max:500',
            'phone'       => 'required|numeric|digits_between:10,15',
            'notes'       => 'nullable|string|max:1000',
        ]);

        $cart = session('components.cart', []);

        if (empty($cart)) {
            return redirect()->route('pages.pembeli.checkout')->with('error', 'Keranjang kosong, tidak bisa checkout.');
        }

         try {
        // Hitung total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Simpan dalam satu baris tabel checkout
        Checkout::create([
            'items'      => json_encode($cart), // Simpan semua item sebagai JSON
            'email'      => $validated['email'],
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'address'    => $validated['address'],
            'phone'      => $validated['phone'],
            'notes'      => $validated['notes'] ?? '',
            'total'      => $total,
        ]);

            // Kosongkan cart setelah berhasil checkout
            session()->forget('components.cart');

            return redirect()->route('pages.pembeli.checkout')->with('success', 'Checkout berhasil! Silakan lanjut ke pembayaran.');
        } catch (\Exception $e) {
            return redirect()->route('pages.pembeli.checkout')->with('error', 'Terjadi kesalahan saat checkout. Silakan coba lagi.');
        }
    }

    // Jika user belum login saat proses checkout
    public function proceedToCheckout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return redirect()->route('pages.pembeli.checkout');
    }
}
