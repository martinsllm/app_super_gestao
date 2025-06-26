<?php

namespace App\Repositories;

use App\Contracts\SupplierRepositoryInterface;
use App\Models\Supplier;

class SupplierRepository implements SupplierRepositoryInterface
{
    protected $supplier;

    public function __construct()
    {
        $this->supplier = new Supplier();
    }

    public function create(array $attributes)
    {
        $this->supplier->fill($attributes);
        $this->supplier->save();
    }

    public function list(array $attributes)
    {
        return $this->supplier
            ->where('name', 'like', '%' . $attributes['name'] . '%')
            ->where('uf', 'like', '%' . $attributes['uf'] . '%')
            ->where('email', 'like', '%' . $attributes['name'] . '%')
            ->get();
    }
}
