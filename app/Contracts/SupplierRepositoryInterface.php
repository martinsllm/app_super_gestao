<?php

namespace App\Contracts;

interface SupplierRepositoryInterface
{
    public function create(array $attributes);

    public function list(array $attributes);
}
