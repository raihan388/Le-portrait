<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    // Menampilkan halaman keranjang (view)
    public function cart()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        return view('components.cart', compact('cartItems'));
    }

    // Menambahkan item ke cart (harus login)
    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        if (!$product) {
            return redirect()->back()->withErrors('Produk tidak ditemukan');
        }

        $userId = auth()->id();
        $productId = $product->id;

        $cartItem = Cart::where('user_id', $userId)
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect('/cart')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    // Ambil data cart via AJAX
    public function getCartJson()
    {
        $userId = auth()->id();

        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

        return response()->json($cartItems);
    }
}
