<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManualResetPasswordController extends Controller
{
    // Form untuk memasukkan email
    public function formEmail()
    {
        return view('auth.manual-forgot-password');
    }

    // Cek email
    public function cekEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak ditemukan.',
        ]);

        return redirect()->route('manual.password.form', ['email' => $request->email]);
    }

    // Form reset password (setelah email valid)
    public function formReset($email)
    {
        return view('auth.manual-reset-password', compact('email'));
    }

    // Simpan password baru
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password berhasil diubah, silakan login.');
    }
}
