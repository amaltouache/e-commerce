<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CartController extends AbstractController
{
    

    #[Route('/cart', name: 'cart')]
    public function index(): Response
    {
        return $this->render('cart/cart.html.twig');
    }


   #[Route('/cart/add/{id}', name: 'cart_add')]
    public function addToCart(Product $product,CartHandler $cartHandler): Response 
    {

    $cart = $cartHandler->get('default');

    $item = new CartItem(
        $product,
        $product->getPrice(),
        1
    );

    $cartHandler->add($item, $cart);

    return $this->redirectToRoute('cart');
}
}
