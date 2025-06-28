<?php

namespace App\Http\Controllers;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(private ProductRepositoryInterface $repository)
    {
        $this->productRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->getAll();
        return view('app.product.index', ['products' => $products, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        return view('app.product.create', ['units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:40',
            'description' => 'required',
            'weight' => 'required|gt:0',
            'unit_id' => 'exists:units,id'
        ];

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'name:min' => 'O campo nome deve ter pelo menos 3 caracteres',
            'name:max' => 'O campo nome deve ter no máximo 40 caracteres',
            'weight' => 'O campo peso deve ter um valor positivo',
            'unit_id.exists' => 'A unidade de medida informada não existe'
        ];

        if ($request->validate($rules, $messages)) {
            $this->productRepository->create($request->all());
        }

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('app.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $units = Unit::all();
        return view('app.product.edit', ['product' => $product, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.show', ['product' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
