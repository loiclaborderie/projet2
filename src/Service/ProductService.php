<?php

namespace App\Service;

use App\Entity\Produits;
use App\Repository\ProduitsRepository;
use Exception;

class ProductService
{
    public function __construct(private ProduitsRepository $repository)
    {

    }
    public function getAll(): array
    {
        return $this->repository->findAll();
    }
    public function getById(int $id): Produits|Exception
    {
        $data = $this->repository->find($id);
        if ($data == null) {
            throw new Exception("Ce produit n'existe pas");
        }
        return $data;
    }
}