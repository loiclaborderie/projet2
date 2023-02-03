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
    #[Route('/', name: 'get.produits', methods: 'GET')]
    public function getAll(): JsonResponse
    {
        $data = $this->service->getAll();
        return $this->json($data);
    }
    #[Route('/{id}', name: 'get.produits.by.id', methods: 'GET')]
    public function getById(int $id): JsonResponse
    {
        try {
            $data = $this->service->getById($id);
            return $this->json($data);
        } catch (\Exception $e) {
            return $this->json($e->getMessage());
        }
    }
}