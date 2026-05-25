<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/categories', name: 'categories')]
    public function categories(): Response
    {
        return $this->render('pages/browse_categories.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/categories/{id}/products', name: 'products_by_category')]
    public function productsByCategory(Category $category): Response
    {
        return $this->render('pages/products_by_category.html.twig', [
            'category' => $category,
            'products' => $category->getProducts(),
        ]);
    }
}
