<?php

namespace App\Service;

use App\Repository\ProduitsRepository;

class ProductService
{
    public function __construct(private ProduitsRepository $repository)
    {

    }
    public function getAll(): array
    {
        return $this->repository->findAll();
    }
}