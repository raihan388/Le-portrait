<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        
        // Ambil cart dari session dan ubah ke Collection
        $cartItems = collect(session('cart', []));

        return view('profile', compact('user', 'cartItems'));
    }
}
