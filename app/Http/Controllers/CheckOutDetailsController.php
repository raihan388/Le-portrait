<?php

namespace App\Http\Controllers;

use App\Models\CheckoutDetails;
use Illuminate\Http\Request;

class CheckOutDetailsController extends Controller
{
    public function checkoutdetails() {
        return view('checkout_details');
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

        return view('checkoutsuccess', ['data' => $validated]);
    }
}
