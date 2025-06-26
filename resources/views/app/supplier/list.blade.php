@extends('app.layouts.base')

@section('title', 'Fornecedor')

@section('content')

    <div class="content-page">
        <div class="title-page-2">
            <p>Lista de Fornecedores</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.supplier.add') }}"> Novo </a></li>
                <li><a href="{{ route('app.supplier') }}"> Consulta </a></li>
            </ul>
        </div>

        <div class="info-page">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->uf }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>Editar</td>
                                <td>Excluir</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection