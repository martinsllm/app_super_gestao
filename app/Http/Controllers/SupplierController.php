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
        return view('app.supplier.list', ['suppliers' => $suppliers, 'request' => $request->all()]);
    }

    public function add(Request $request)
    {
        $msg = '';

        $rules = [
            'name' => 'required|min:3|max:40',
            'uf' => 'required|min:2|max:2',
            'email' => 'required|email'
        ];

        if ($request->input('_token') != '' && $request->input('id') == '') {
            if ($request->validate($rules)) {
                $this->supplierRepository->create($request->all());
                $msg = 'Fornecedor cadastrado com sucesso!';
            }
        }

        if ($request->input('_token') != '' && $request->input('id') != '') {
            $supplier = $this->supplierRepository->findById($request->input('id'));

            if ($request->validate($rules)) {
                $supplier->update($request->all());
                $msg = 'Fornecedor atualizado com sucesso!';
            }

            return redirect()->route('app.supplier.update', ['id' => $supplier->id, 'msg' => $msg]);
        }

        return view('app.supplier.add', ['msg' => $msg, 'title' => 'Novo Fornecedor']);
    }

    public function update($id, $msg = '')
    {
        $supplier = $this->supplierRepository->findById($id);
        return view('app.supplier.add', ['supplier' => $supplier, 'msg' => $msg, 'title' => 'Editar Fornecedor']);
    }

    public function delete($id)
    {
        $supplier = $this->supplierRepository->findById($id);

        if ($supplier) {
            $this->supplierRepository->delete($supplier->id);
            return redirect()->route('app.supplier');
        }
    }
}
