<?php

namespace App\DTO;

class Cart
{
    private string $id;
    private \DateTime $createdAt;

    /** @var CartItem[] */
    private array $cartItems = [];

    public function __construct()
    {
        $this->id = uniqid();
        $this->createdAt = new \DateTime();
    }

    public function addItem(CartItem $item): void
    {
        $this->cartItems[] = $item;
    }

    public function getCartItems(): array
    {
        return $this->cartItems;
    }

    public function total(): float
    {
        return array_reduce(
            $this->cartItems,
            fn ($total, $item) => $total + ($item->getPrice() * $item->getQuantity()),
            0
        );
    }
}
