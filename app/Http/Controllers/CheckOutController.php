<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    // Menampilkan halaman checkout
    public function checkout()
    {
        $cart = session('cart', [
            'product' => 'Canon EOS R6',
            'price' => 28500000,
            'quantity' => 1,
            'image' => 'images/canon r6.jpg',
        ]);

        return view('checkout_details', compact('cart')); // Pastikan view-nya sesuai
    }

    // Menerima data saat tombol "Order" diklik
    public function proceedToCheckout(Request $request)
    {
        $quantity = $request->input('quantity', 1); // ambil dari name="quantity"

        session([
            'cart' => [
                'product' => 'Canon EOS R6',
                'price' => 28500000,
                'quantity' => $quantity,
                'image' => 'images/canon r6.jpg',
            ]
        ]);

        return redirect()->route('checkout');
    }
}

