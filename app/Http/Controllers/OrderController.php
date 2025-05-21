<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        return view('coba');
    }
    public function checkout(Request $request){
        dd($request->all());
    }
}
