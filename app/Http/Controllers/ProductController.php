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
        return view('pages.pembeli.dslr', compact('products','item'));
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
        return view('pages.pembeli.mirrorless', compact('products','item'));
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
        return view('pages.pembeli.film', compact('products','item'));
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
        return view('pages.pembeli.lenses', compact('products','item'));
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
        return view('pages.pembeli.flash', compact('products','item'));
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
        return view('pages.pembeli.tripod', compact('products','item'));
    }
    
}
