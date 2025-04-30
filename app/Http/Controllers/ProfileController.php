<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();
        
        // Return view sesuai dengan nama file yang Anda miliki
        return view('profile', compact('user'));
    }
}