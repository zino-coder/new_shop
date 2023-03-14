<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->input('product_id'));

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        Cart::add($product);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request)
    {
        $productId = $request->input('product_id');

        Cart::remove($productId);

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function clear()
    {
        Cart::clear();

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }

    public function index()
    {
        $cart = Cart::getContents();

        return view('frontend.cart.index', compact('cart'));
    }
}
