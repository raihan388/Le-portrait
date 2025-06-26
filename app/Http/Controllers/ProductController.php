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

    public function dslr()
    {
        $products = Product::with('category')->whereHas('category',function ($query) {
            $query->where('name', 'dslr');
        })->where('is_active', true)->get();
        $item = ([
            'title' => "DSLR Camera",
            'description' => "Explore our collection of DSLR cameras, perfect for both beginners and professionals. Capture stunning images with advanced features and high-quality lenses."
        ]);
        return view('pages.pembeli.dslr', compact('products','item'))
    ->with('currentCategory', 'dslr');

    }
    public function mirrorless()
    {
        $products = Product::with('category')->whereHas('category',function ($query) {
            $query->where('name', 'mirrorless');
        })->where('is_active', true)->get();
        $item = ([
            'title' => "Mirrorless Camera",
            'description' => "Discover our range of mirrorless cameras, offering compact designs and exceptional image quality. Perfect for travel and everyday photography."
        ]);
        return view('pages.pembeli.mirrorless', compact('products','item'))
    ->with('currentCategory', 'mirrorless');

    }

    public function film()
    {
        $products = Product::with('category')->whereHas('category',function ($query) {
            $query->where('name', 'film');
        })->where('is_active', true)->get();
        $item = ([
            'title' => "Film Camera",
            'description' => "Discover our range of mirrorless cameras, offering compact designs and exceptional image quality. Perfect for travel and everyday photography."
        ]);
       return view('pages.pembeli.film', compact('products','item'))
    ->with('currentCategory', 'film');

    }
    public function lenses()
    {
        $products = Product::with('category')->whereHas('category',function ($query) {
            $query->where('name', 'lenses');
        })->where('is_active', true)->get();
        $item = ([
            'title' => "Lenses Camera",
            'description' => "Discover our range of mirrorless cameras, offering compact designs and exceptional image quality. Perfect for travel and everyday photography."
        ]);
        return view('pages.pembeli.lenses', compact('products','item'))
    ->with('currentCategory', 'lenses');

    }

    public function flash()
    {
        $products = Product::with('category')->whereHas('category',function ($query) {
            $query->where('name', 'flash');
        })->where('is_active', true)->get();
        $item = ([
            'title' => "Flash Camera",
            'description' => "Discover our range of mirrorless cameras, offering compact designs and exceptional image quality. Perfect for travel and everyday photography."
        ]);
        return view('pages.pembeli.flash', compact('products','item'))
    ->with('currentCategory', 'flash');

    }
    public function tripods()
    {
        $products = Product::with('category')->whereHas('category',function ($query) {
            $query->where('name', 'tripods');
        })->where('is_active', true)->get();
        $item = ([
            'title' => "Tripods Camera",
            'description' => "Discover our range of mirrorless cameras, offering compact designs and exceptional image quality. Perfect for travel and everyday photography."
        ]);
       return view('pages.pembeli.tripods', compact('products','item'))
    ->with('currentCategory', 'tripods');

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
