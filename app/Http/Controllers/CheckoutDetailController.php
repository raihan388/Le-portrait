<?php

namespace App\Http\Controllers;

use App\Models\CheckoutDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    // Method lain...

    public function checkoutdetail()
    {
        // Ambil data keranjang dari session
        $cart = session('components.cart', []);

        // Ambil data pembeli dari session
        $checkoutData = [
            'email' => session('checkout.email', 'dummy@example.com'),
            'first_name' => session('checkout.first_name', 'John'),
            'last_name' => session('checkout.last_name', 'Doe'),
            'address' => session('checkout.address', 'Jl. Contoh No. 123'),
            'phone' => session('checkout.phone', '081234567890'),
            'notes' => session('checkout.notes', 'Catatan pembeli contoh.'),
        ];

        // Untuk keperluan testing, jika cart kosong isi dummy product
        if (empty($cart)) {
            $cart = [
                [
                    'product' => 'Kamera Canon',
                    'price' => 1500000,
                    'quantity' => 1,
                    'image' => 'canon.jpg'
                ],
                [
                    'product' => 'Lensa Nikon',
                    'price' => 900000,
                    'quantity' => 2,
                    'image' => 'nikon.jpg'
                ]
            ];
        }

        // Tampilkan halaman checkout detail
        return view('pages.pembeli.checkoutdetail', compact('cart', 'checkoutData'));
    }

    // Method lain...
}
