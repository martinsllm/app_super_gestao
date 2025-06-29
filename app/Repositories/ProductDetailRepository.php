<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\Product;

class ProductDetailRepository implements RepositoryInterface
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
