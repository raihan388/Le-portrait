<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailProdukController extends Controller
{
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
}
