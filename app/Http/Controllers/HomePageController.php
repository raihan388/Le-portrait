<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function homepage() {
        return view('homepage');
    }
    public function index() {
  $products = Product::all(); // atau pakai pagination
  return view('homepage', compact('product'));
}

}
