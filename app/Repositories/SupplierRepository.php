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
        $name = $attributes["name"] ?? "";
        $uf = $attributes["uf"] ?? "";
        $email = $attributes["email"] ?? "";

        $suppliers = $this->supplier
            ->where('name', 'like', '%' . $name . '%')
            ->where('uf', 'like', '%' . $uf . '%')
            ->where('email', 'like', '%' . $email . '%')
            ->paginate(2);

        return $suppliers;
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
