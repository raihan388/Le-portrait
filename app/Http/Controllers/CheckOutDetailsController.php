<?php

namespace App\Http\Controllers;

use App\Models\CheckoutDetails;
use Illuminate\Http\Request;

class CheckOutDetailsController extends Controller
{
    public function checkoutform()
    {
        return view('pages.pembeli.checkout');
    }

    public function checkoutdetails()
    {
        $cart = session('cart');

        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Cart is empty.');
        }

    return view('checkout_details', compact('cart'));
}


    public function checkoutsubmit(Request $request)
    {
        try {
            $validated = $request->validate([
                'email'       => 'required|email',
                'first_name'  => 'required|string|max:255',
                'last_name'   => 'required|string|max:255',
                'address'     => 'required|string|max:500',
                'phone'       => 'required|numeric|digits_between:10,15',
                'notes'       => 'nullable|string|max:1000',
                'qty'         => 'required|integer|min:1',
            ]);

            $cart = session('cart');

            CheckoutDetails::create([
                ...$validated,
                'product' => $cart['product'] ?? 'Unknown Product',
                'price' => $cart['price'] ?? 0,
                'subtotal' => ($validated['qty'] ?? 1) * ($cart['price'] ?? 0),
            ]);

            return redirect()->route('checkoutdetails')->with('success', 'Checkout successful! Proceed to payment.');
        } catch (\Exception $e) {
            return redirect()->route('checkoutdetails')->with('error', 'Checkout failed. Please try again.');
        }
    }
}
