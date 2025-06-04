<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    // Menampilkan halaman checkout
    public function checkout()
    {
        $cart = session('cart', []);
        $cartItems = collect($cart); // agar bisa pakai sum(), map(), dll

        return view('checkout', compact('cartItems'));
    }

    // Menambahkan item ke keranjang (bisa dari halaman produk)
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|string',
        ]);

        return view('checkout_details', compact('cart')); // Pastikan view-nya sesuai
    }

    // Menerima data saat tombol "Order" diklik
    public function proceedToCheckout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Lanjut ke detail checkout
        return redirect()->route('checkoutdetails');
    }
}
