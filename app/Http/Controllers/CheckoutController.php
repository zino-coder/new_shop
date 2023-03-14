<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $cart = session()->get('cart');

        return view('frontend.cart.checkout', ['cart' => $cart]);
    }
}
