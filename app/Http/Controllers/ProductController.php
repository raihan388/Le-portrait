<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id) {
        $produk = Product::findOrFail($id);
        $rating = $produk->rating; // misalnya rating-nya 4.3
        
        // Hitung jumlah bintang
        $fullStars = floor($rating);
        $halfStar = ($rating - $fullStars) >= 0.5;
        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
        
        // Kirim ke view
        return view('produk.detail', compact('produk', 'rating', 'fullStars', 'halfStar', 'emptyStars'));
}

public function search(Request $request)
{
    $query = $request->input('q');

    // Misalnya kamu pakai data statis:
    $products = collect([
        ['id' => 1, 'name' => 'Canon DSLR', 'price' => 100],
        ['id' => 2, 'name' => 'Sony Mirrorless', 'price' => 200],
        ['id' => 3, 'name' => 'Tripod Mini', 'price' => 50],
    ]);

    $filtered = $products->filter(function ($item) use ($query) {
        return stripos($item['name'], $query) !== false;
    });

    return view('produk.search', ['products' => $filtered, 'query' => $query]);
}
}
