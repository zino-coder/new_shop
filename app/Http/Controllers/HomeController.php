<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('featuredImage')->limit(8)->get();

        return view('frontend.home.index', ['products' => $products]);
    }

    public function productDetail($lug)
    {
        $product = Product::where('slug', $lug)->first();

        return view('frontend.home.product_detail', ['product' => $product]);
    }
}
