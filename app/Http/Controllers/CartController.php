<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function Cart() {
        $items = [
            (object)[
                'name' => 'Canon EOS R6',
                'quantity' => 1,
                'price' => 28500000,
            ],
            (object)[
                'name' => 'Sony A7 III',
                'quantity' => 2,
                'price' => 25000000,
            ],
        ];
    
        return view('cart', compact('items'));
    }}