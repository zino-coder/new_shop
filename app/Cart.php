<?php

namespace App;

use App\Models\Product;

class Cart
{
    public static function add(Product $product, $quantity = 1)
    {
        $cart = session()->get('cart');

        // Nếu giỏ hàng chưa tồn tại, tạo giỏ hàng mới
        if (!$cart) {
            $cart = [
                $product->id => [
                    'name' => $product->name,
                    'quantity' => $quantity,
                    'price' => $product->regular_price,
                    'img' => $product->featuredImage->name,
                ]
            ];

            session()->put('cart', $cart);

            return true;
        }

        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
            session()->put('cart', $cart);

            return true;
        }

        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới sản phẩm
        $cart[$product->id] = [
            'name' => $product->name,
            'quantity' => $quantity,
            'price' => $product->price
        ];

        session()->put('cart', $cart);

        return true;
    }

    public static function remove($productId)
    {
        $cart = session()->get('cart');

        // Nếu sản phẩm không có trong giỏ hàng, không làm gì cả
        if (!isset($cart[$productId])) {
            return false;
        }

        unset($cart[$productId]);

        session()->put('cart', $cart);

        return true;
    }

    public static function clear()
    {
        session()->forget('cart');
    }

    public static function getContents()
    {
        return session()->get('cart');
    }

    public static function count()
    {
        return session()->has('cart') ? count(session()->get('cart')) : 0;
    }
}
