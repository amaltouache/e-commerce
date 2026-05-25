<?php

namespace App\Cart;

use App\DTO\Cart;
use App\DTO\CartItem;

class ApiCart implements CartInterface
{
    public function add(CartItem $item, Cart $cart): Cart
    {
        dd('API ADD CALLED', $item);
    }

    public function remove(CartItem $item, Cart $cart): Cart
    {
        dd('API REMOVE CALLED');
    }

    public function getCart(string $identifier): Cart
    {
        dd('API GET CART');
    }

    public function clearCart(string $identifier): void
    {
        dd('API CLEAR CART');
    }
}

