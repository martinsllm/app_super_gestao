<?php

namespace App\Contracts;


interface ProductRepositoryInterface
{
    public function getAll();

    public function create(array $attributes);
}


