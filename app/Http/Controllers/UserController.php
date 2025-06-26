<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function profile()
    {
        $user = Auth::user();
        $cartItems = collect(session('cart', []));
        if ($user->profile_image && file_exists(public_path('storage/' . $user->profile_image))) {
            $user->profile_image_url = asset('storage/' . $user->profile_image);
        } else {
            $user->profile_image_url = asset('images/default-avatar.jpg');
        }
        return view('profile', compact('user', 'cartItems'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone'          => 'required|string|max:20',
            'address'        => 'required|string|max:255',
            'profile_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        // Simpan gambar jika ada
            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image')->store('profile_image', 'public');

                // Hapus gambar lama jika bukan default
                if ($user->profile_image && $user->profile_image !== 'images/default-avatar.jpg') {
                    Storage::disk('public')->delete($user->profile_image);
                }

                $user->profile_image = $imagePath;
            }

        // Update data user
        $user->name = $validated['name'];
        $user->email    = $validated['email'];
        $user->phone    = $validated['phone'];
        $user->address  = $validated['address'];
        $user->save();
          
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}