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

    public function list(array $attributes)
    {
        return $this->supplier
            ->where('name', 'like', '%' . $attributes['name'] . '%')
            ->where('uf', 'like', '%' . $attributes['uf'] . '%')
            ->where('email', 'like', '%' . $attributes['name'] . '%')
            ->get();
    }

    public function findById($id)
    {
        return $this->supplier->find($id);
    }

    public function create(array $attributes)
    {
        $this->supplier->fill($attributes);
        $this->supplier->save();
    }

    public function update(array $attributes)
    {
        $this->supplier->update($attributes);
    }
}
