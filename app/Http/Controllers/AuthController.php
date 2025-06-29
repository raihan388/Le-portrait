<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function auth() {
        return view('login');
    }

    public function submitRegistrasi(Request $request) {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required|string|min:8',
        'phone' => 'nullable|string|max:15',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password_confirmation.required' => 'Konfirmasi kata sandi wajib diisi.',
            'phone.max' => 'Nomor telepon maksimal 15 karakter.',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone; 
        $user->save();
        return redirect()->route('homepage.show')->with('success', 'Registrasi berhasil, silakan masuk.');
    }

    public function submitLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ],
        [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard('web')->attempt($infologin)) {
           $request->session()->regenerate();
            if (Auth::guard('web')->user()->role == 'pembeli') {
                return redirect()->route('homepage.show');
            }
        } else {
            return redirect()->back()->withErrors(['email' => 'Email atau kata sandi salah.']);
        }
        

    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda telah keluar.');
    }
}
