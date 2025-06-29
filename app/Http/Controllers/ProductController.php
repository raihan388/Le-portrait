<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        // Ambil hanya produk yang aktif
        $products = Product::with('category', 'brand')->where('is_active', true)->get();

        return view('pages.homepage', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::with('category', 'brand')
        ->where(function ($query) use ($search) {
        $query->where('name', 'LIKE', '%' . $search . '%')
              ->orWhere('description', 'LIKE', '%' . $search . '%');
        })
        ->where('is_active', true)
        ->get();

        return view('pages.homepage', compact('products', 'search'));
    }

    public function detail($slug) {
        $product = Product::with('category','brand')->where('slug', $slug)->get();
        return view('pages.pembeli.detailproduk', compact('product'));

    }

    public function showCategory($categoryName)
    {
        $categoryData = [
            'dslr' => [
                'title' => "DSLR Camera",
                'description' => "Explore our collection of DSLR cameras, perfect for both beginners and professionals. Capture stunning images with advanced features and high-quality lenses."
            ],
            'mirrorless' => [
                'title' => "Mirrorless Camera",
                'description' => "Discover our range of mirrorless cameras, offering compact designs and exceptional image quality. Perfect for travel and everyday photography."
            ],
            'film' => [
                'title' => "Film Camera",
                'description' => "Classic photography with our film cameras. Perfect for vintage lovers."
            ],
            'lenses' => [
                'title' => "Lenses Camera",
                'description' => "Find high-quality lenses for sharp, vibrant images in any condition."
            ],
            'flash' => [
                'title' => "Flash Camera",
                'description' => "Add light to your shots with our reliable camera flashes."
            ],
            'tripods' => [
                'title' => "Tripods Camera",
                'description' => "Keep your shots steady with our durable and flexible tripods."
            ]
        ];

        // Handle jika kategori tidak ditemukan
        if (!array_key_exists($categoryName, $categoryData)) {
            abort(404); // atau redirect ke halaman default
        }

        $products = Product::with('category')->whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->where('is_active', true)->get();

        $item = $categoryData[$categoryName];

        return view('pages.pembeli.category', compact('products', 'item'))
            ->with('currentCategory', $categoryName);
    }

    public function showBrand($brandName)
    {
        $brandData = [
            'nikon' => [
                'title' => "Nikon Camera",
                'description' => "Explore our collection of DSLR cameras, perfect for both beginners and professionals. Capture stunning images with advanced features and high-quality lenses."
            ],
            'canon' => [
                'title' => "Canon Camera",
                'description' => "Discover our range of mirrorless cameras, offering compact designs and exceptional image quality. Perfect for travel and everyday photography."
            ],
            'sony' => [
                'title' => "Sony Camera",
                'description' => "Classic photography with our film cameras. Perfect for vintage lovers."
            ],
            'fujifilm' => [
                'title' => "FujiFilm Camera",
                'description' => "Find high-quality lenses for sharp, vibrant images in any condition."
            ],
            'leica' => [
                'title' => "Leica Camera",
                'description' => "Add light to your shots with our reliable camera flashes."
            ],
        ];
    
        // Handle jika kategori tidak ditemukan
        if (!array_key_exists($brandName, $brandData)) {
            abort(404); // atau redirect ke halaman default
        }
    
        $products = Product::with('brand')->whereHas('brand', function ($query) use ($brandName) {
            $query->where('name', $brandName);
        })->where('is_active', true)->get();
    
        $item = $brandData[$brandName];
    
        return view('pages.pembeli.brand', compact('products', 'item'))
            ->with('currentBrand', $brandName);
    }

    
    public function filterByCategoryAndBrand($category, $brand)
{
    $categoryFormatted = ucwords(str_replace('-', ' ', $category));

    $products = Product::whereHas('category', function ($query) use ($categoryFormatted) {
        $query->where('name', 'LIKE', '%' . $categoryFormatted . '%');
    })
    ->whereHas('brand', function ($query) use ($brand) {
        $query->where('name', $brand);
    })
    ->where('is_active', true)
    ->get();

    return view('pages.pembeli.filtered', [
        'products' => $products,
        'brand' => $brand,
        'categoryFormatted' => $categoryFormatted,
    ]);
}

}
