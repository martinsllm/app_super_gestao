<?php

namespace App\Contracts;

interface SupplierRepositoryInterface
{

    public function list(array $attributes);

    public function findById($id);

    public function create(array $attributes);
}
