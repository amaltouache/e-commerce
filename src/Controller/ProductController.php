<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/product/{id}', name: 'product_details')]
    public function productDetails(Product $product): Response
    {
    return $this->render('pages/product_details.html.twig', [
        'product' => $product
    ]);
    }   
}
