@extends('app.layouts.base')

@section('title', 'Fornecedor')

@section('content')

    <div class="content-page">
        <div class="title-page-2">
            <p>Lista de Fornecedores</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('supplier.index') }}"> Voltar </a></li>
                <li><a href="{{ route('supplier.create') }}"> Novo </a></li>
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
                                <td><a href="{{ route('supplier.edit', ['supplier' => $supplier->id]) }}"> Editar </a></td>
                                <td>
                                    <form id="form_{{$supplier->id}}" method="post"
                                        action="{{ route('supplier.destroy', ['supplier' => $supplier->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$supplier->id}}').submit()">
                                            Excluir
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $suppliers->appends($request)->links() }}
                <br>
                Exibindo {{ $suppliers->count() }} de {{ $suppliers->total() }} registros encontrados.
            </div>
        </div>
    </div>

@endsection