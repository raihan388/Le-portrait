<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItem;

class PageController extends Controller
{
    public function dslr()
    {
        $dataproduct = [
           [
            'name' => 'Canon EOS 90D',
            'image' => 'https://example.com/canon-eos-90d.jpg',
            'price' => 15000000,
            'description' => 'Canon EOS 90D is a versatile DSLR camera with a 32.5MP sensor and 4K video recording.',
            
           ],
           [
            'name' => 'Nikon D7500',
            'image' => 'https://example.com/nikon-d7500.jpg',
            'price' => 12000000,
            'description' => 'Nikon D7500 is a powerful DSLR camera with a 20.9MP sensor and 4K UHD video recording.',
           ],
           [
            'name' => 'Canon EOS Rebel T7i',
            'image' => 'https://example.com/canon-eos-rebel-t7i.jpg',
            'price' => 10000000,
            'description' => 'Canon EOS Rebel T7i is an entry-level DSLR camera with a 24.2MP sensor and built-in Wi-Fi.',
           ],
          ];
          return $dataproduct;
    }

    public function mirrorless()
    {
        return view('pages.mirrorless');
    }

    public function film()
    {
        return view('pages.film');
    }

    public function lenses()
    {
        return view('pages.lenses');
    }

    public function flash()
    {
        return view('pages.flash');
    }

    public function tripod()
    {
        return view('pages.tripod');
    }

    public function show($slug)
    {
        $products = [
            'canon-eos-r6' => [
                'title' => 'Canon EOS R6',
                'features' => [
                    'Newest technology',
                    'Best in class components',
                    'Dimensions - 69.5 x 75.0 x 169.0',
                    'Maintenance free',
                    '12 years warranty',
                ],
                'category' => 'Mirrorless',
            ],
        ];

        if (!isset($products[$slug])) {
            abort(404);
        }

        $product = $products[$slug];

        return view('pages.detailproduk', compact('product'));
    }

    public function index()
    {
       $orders = Order::where('email', Auth::user()->email)
            ->latest()
            ->paginate(10);

        return view('pages.history', compact('orders'));
    }
}
