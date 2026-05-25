<?php

namespace App\DTO;

use App\Entity\Product;

class CartItem
{
    public function __construct(
        private Product $product,
        private float $price,
        private int $quantity,
    ) {
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
