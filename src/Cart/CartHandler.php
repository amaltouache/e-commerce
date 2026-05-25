<?php

namespace App\Cart;

use App\DTO\Cart;
use App\DTO\CartItem;

class CartHandler
{
    public function __construct(
        private CartInterface $cart
    ) {}

    public function add(CartItem $item, Cart $cart): Cart
    {
        return $this->cart->add($item, $cart);
    }

    public function remove(CartItem $item, Cart $cart): Cart
    {
        return $this->cart->remove($item, $cart);
    }

    public function get(string $id): Cart
    {
        return $this->cart->getCart($id);
    }

    public function clear(string $id): void
    {
        $this->cart->clearCart($id);
    }
}

