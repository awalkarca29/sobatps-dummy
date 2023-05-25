<?php

namespace App\Http\Controllers;

use App\Models\Product;

class WebProductController extends Controller
{
    public function index()
    {
        return view('products', [
            "title" => "Semua Produk Kami",
            "active" => 'products',
            // "products" => Product::all(),
            "products" => Product::latest()->get(),
        ]);
    }

    public function show(Product $product)
    {
        return view('product', [
            "title" => "Products",
            "active" => 'products',
            "product" => $product,
        ]);
    }
}
