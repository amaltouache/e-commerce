<?php

namespace App\Cart;

use App\DTO\Cart;
use App\DTO\CartItem;
use Symfony\Component\HttpFoundation\RequestStack;

class SessionCart implements CartInterface
{
    public function __construct(
        private RequestStack $requestStack,
    ) {
    }

    public function add(CartItem $item, Cart $cart): Cart
{
    dd('SESSION ADD CALLED', $item);
}

    public function remove(CartItem $item, Cart $cart): Cart
{
    $items = array_filter(
        $cart->getCartItems(),
        fn($i) => $i->getProduct()->getId() !== $item->getProduct()->getId()
    );

    $reflection = new \ReflectionClass($cart);
    $property = $reflection->getProperty('cartItems');
    $property->setAccessible(true);
    $property->setValue($cart, $items);

    $this->requestStack->getSession()->set('cart', $cart);

    return $cart;
}

    public function getCart(string $identifier): Cart
    {
        return $this->requestStack
            ->getSession()
            ->get('cart', new Cart());
    }

    public function clearCart(string $identifier): void
    {
        $this->requestStack
            ->getSession()
            ->remove('cart');
    }
}
