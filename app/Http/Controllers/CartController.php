<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'numeric|min:1',
            
        ]);

        $product = Product::findOrFail($request->product_id);

        // Cek apakah produk sudah ada di keranjang
        $existing = Cart::where('user_id', Auth::id())
                        ->where('product_id', $request->product_id)
                        ->first();

        if ($existing) {
            // Jika sudah ada, update jumlahnya
            $existing->quantity += $request->quantity;
            $existing->save();
        } else {
            // Jika belum ada, buat baru
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
                'quantity'   => $request->quantity,
                'price'      => $product->price,
            ]);
        }

        return redirect()->back()->with('success', 'Product successfully added to cart.');
    }

    public function showCart()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        return view('pages.cart.index', compact('cartItems'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
    
        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
    
        return redirect()->route('cart.show')->with('success', 'Jumlah berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $cartItem = Cart::where('id', $id)
                        ->where('user_id', Auth::id()) // untuk keamanan, hanya hapus item milik user login
                        ->firstOrFail();

        $cartItem->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function checkoutStep1(Request $request)
{
    $selectedIds = explode(',', $request->input('selected_items'));

    if (empty($selectedIds)) {
        return redirect()->route('cart.show')->with('error', 'Tidak ada item yang dipilih.');
    }

    $cartItems = Cart::with('product')
        ->where('user_id', Auth::id())
        ->whereIn('id', $selectedIds)
        ->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.show')->with('error', 'Item tidak ditemukan di cart.');
    }

    // Simpan ke session untuk halaman berikutnya (data form customer)
    session(['checkout.items' => $cartItems->pluck('id')->toArray()]);

    return view('pages.pembeli.checkout', compact('cartItems'));
}

}

