<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListProdukController extends Controller
{
    public function getData() {
        $dataproduct = [
          ['id' => 1, 'name' => 'Product 1', 'price' => 100],
          ['id' => 2, 'name' => 'Product 2', 'price' => 200],
          ['id' => 3, 'name' => 'Product 3', 'price' => 300],
          ['id' => 4, 'name' => 'Product 4', 'price' => 400],
          ['id' => 5, 'name' => 'Product 5', 'price' => 500],
        ];
        return $dataproduct;
    }
    public function list() {
        $data = $this->getData();
        return view('pages.list_product',compact('data'));
    }

    public function detail($id) {
    $data = $this->getData();
    $product = collect($data)->firstWhere('id', (int) $id);

    if (!$product) {
        abort(404, 'Produk tidak ditemukan');
    }

    return view('pages.detail_product', compact('product'));
}
}
