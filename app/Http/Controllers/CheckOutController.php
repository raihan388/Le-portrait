<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index() {
        return view('checkout');
    }

    public function proceedToCheckout(Request $request)
    {
        $quantity = $request->input('quantity', 1);
    
        session([
            'cart' => [
                'product' => 'Canon EOS R6',
                'price' => 28500000,
                'quantity' => $quantity,
                'image' => 'images/canon r6.jpg',
            ]
        ]);
    
        return redirect()->route('checkoutdetails');
    }
}
