<?php

namespace App\Contracts;

interface SupplierRepositoryInterface extends PostRepositoryInterface
{
    public function list(array $attributes);

}
