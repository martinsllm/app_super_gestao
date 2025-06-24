<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $suppliers = [
            0 => ['nome' => 'Fornecedor 1', 'status' => 'N']
        ];
        return view('app.supplier.index', compact('suppliers'));
    }
}
