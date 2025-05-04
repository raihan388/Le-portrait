<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dslr()
{
    $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...';

    $products = [
        [
            'title' => 'Canon EOS R6',
            'price' => 'Rp 28.500.000',
            'rating' => '4.8',
            'reviews' => '124',
            'image' => 'images/canon r6.jpg'
        ],
        [
            'title' => 'Sony Alpha a7 III',
            'price' => 'Rp 25.999.000',
            'rating' => '4.7',
            'reviews' => '98',
            'image' => 'images/sony a7iii.jpg'
        ],
        [
            'title' => 'Fujifilm X-T4',
            'price' => 'Rp 23.750.000',
            'rating' => '4.6',
            'reviews' => '76',
            'image' => 'images/fujifilm xt4.jpg'
        ],
        [
            'title' => 'Nikon Z6 II',
            'price' => 'Rp 26.200.000',
            'rating' => '4.5',
            'reviews' => '65',
            'image' => 'images/nikon z6.jpg'
        ]
    ];

    return view('pages.dslr', compact('description', 'products'));
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
        // Contoh data dummy (biasanya ini diambil dari database)
        $orders = [
                    [
                        'name' => 'Canon EOS R6',
                        'image' => 'path/to/canon.jpg',
                        'quantity' => 1,
                        'price' => 28500000
                    ],
                    [
                        'name' => 'Lensa Canon 50mm',
                        'image' => 'path/to/lensa.jpg',
                        'quantity' => 1,
                        'price' => 22750000
                ]
        ];

        return view('pages.order-history', compact('orders'));
    }
}
