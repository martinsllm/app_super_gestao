<?php

namespace App\Http\Controllers;

use App\Contracts\SupplierRepositoryInterface;
use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $supplierRepository;

    public function __construct(private SupplierRepositoryInterface $repository)
    {
        $this->supplierRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        $this->supplierRepository->create($request->all());
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $suppliers = $this->supplierRepository->list($request->all());
        return view('app.supplier.list', ['suppliers' => $suppliers, 'request' => $request->all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('app.supplier.edit', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index');
    }
}
