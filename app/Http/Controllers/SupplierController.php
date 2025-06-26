<?php

namespace App\Http\Controllers;

use App\Contracts\SupplierRepositoryInterface;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $supplierRepository;

    public function __construct(private SupplierRepositoryInterface $repository)
    {
        $this->supplierRepository = $repository;
    }

    public function index()
    {
        return view('app.supplier.index');
    }

    public function list(Request $request)
    {
        $suppliers = $this->supplierRepository->list($request->all());
        return view('app.supplier.list', ['suppliers' => $suppliers]);
    }

    public function add(Request $request)
    {
        $msg = '';

        if ($request->input('_token') != '') {
            $rules = [
                'name' => 'required|min:3|max:40',
                'uf' => 'required|min:2|max:2',
                'email' => 'required|email'
            ];

            $messages = [
                'required' => 'O campo :attribute é obrigatório.',
                'name.min' => 'O campo nome deve ter pelo menos 3 caracteres',
                'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres.',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres.',
                'email' => 'Informe um endereço de e-mail válido.'
            ];

            if ($request->validate($rules, $messages)) {
                $this->supplierRepository->create($request->all());
                $msg = 'Fornecedor cadastrado com sucesso!';
            }
        }

        return view('app.supplier.add', ['msg' => $msg]);
    }
}
