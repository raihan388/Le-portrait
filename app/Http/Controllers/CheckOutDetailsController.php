<?php

namespace App\Http\Controllers;

use App\Models\CheckoutDetails;
use Illuminate\Http\Request;

class CheckOutDetailsController extends Controller
{
    public function checkoutform()
    {
        return view('checkout');
    }

    public function checkoutdetails(Request $request)
{
    // Update session cart
    $cart = session('components.cart');
    if ($cart) {
        $cart['quantity'] = $request->input('quantity', 1);
        session(['cart' => $cart]);
    }

    return view('checkout_details', compact('cart'));
}


    public function checkoutsubmit(Request $request)
    {
        $validated = $request->validate([
            'username'   => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'address'    => 'required|string|max:500',
            'phone'      => 'required|numeric|digits_between:10,15',
            'notes'      => 'nullable|string|max:1000',
        ]);

        CheckoutDetails::create($validated);

        return redirect()->route('checkoutsuccess')->with('data', $validated);
    }

    public function checkoutsuccess()
    {
        $data = session('data');

        return view('checkoutsuccess', compact('data'));
    }
}
