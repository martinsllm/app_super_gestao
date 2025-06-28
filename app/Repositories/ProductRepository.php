<?php

namespace App\Repositories;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function getAll()
    {
        return $this->product->paginate(10);
    }

    public function findById($id)
    {
        return $this->product->find($id);
    }

    public function create(array $attributes)
    {
        $this->product->fill($attributes);
        $this->product->save();
    }
}
