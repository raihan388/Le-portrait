<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $product = Product::findOrFail($request->product_id);

        // Cek apakah produk sudah ada di cart
        $existingCart = Cart::where('product_id', $product->id)->first();

        if ($existingCart) {
            // Update quantity jika sudah ada
            $existingCart->update([
                'quantity' => $existingCart->quantity + 1
            ]);
        } else {
            // Buat baru jika belum ada
            Cart::create([
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id'
        ]);

        $cart = Cart::findOrFail($request->cart_id);
        $cart->delete();

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }

    public function showCart()
    {
        $cart = Cart::with('product')->get();
        
        // Hitung subtotal
        $subtotal = $cart->sum(function($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.show', compact('cart', 'subtotal'));
    }
    public function getCartCount()
    {
        $count = Cart::count();
        return response()->json(['count' => $count]);
    }
}
