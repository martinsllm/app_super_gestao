<?php

namespace App\Contracts;


interface ProductRepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function create(array $attributes);
}


