<?php

namespace App\Controller;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/products')]
class ProductsController extends AbstractController
{
    public function __construct(private ProductService $service)
    {
    }
    #[Route('/', name: 'app_products', methods: 'GET')]
    public function getAll(): JsonResponse
    {
        return $this->json($this->service->getAll());
    }
}