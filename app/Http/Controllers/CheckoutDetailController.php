<?php

namespace App\Http\Controllers;

use App\Models\CheckoutDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutDetailController extends Controller
{
    // Method lainnya...

    public function checkoutdetail()
    {
        // Ambil data pembeli dari session
        $checkoutData = [
            'email' => session('checkout.email'),
            'first_name' => session('checkout.first_name'),
            'last_name' => session('checkout.last_name'),
            'address' => session('checkout.address'),
            'phone' => session('checkout.phone'),
            'notes' => session('checkout.notes'),
        ];

        // Ambil produk yang di-checkout dari session (bukan dari 'components.cart')
        $cart = session('checkout.items', []);

        // Jika data session kosong, redirect ke halaman checkout
        if (empty($cart) || empty($checkoutData['email'])) {
            return redirect()->route('checkout')->with('error', 'Data checkout tidak tersedia.');
        }

        // Tampilkan view dengan data pembeli dan produk yang dibeli
        return view('pages.pembeli.checkoutdetail', compact('cart', 'checkoutData'));
    }
}
