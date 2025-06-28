@extends('app.layouts.base')

@section('title', 'Produto')

@section('content')

    <div class="content-page">
        <div class="title-page-2">
            <p>Lista de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.create')}}"> Novo </a></li>
                <li><a href=""> Consulta </a></li>
            </ul>
        </div>

        <div class="info-page">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->weight }}</td>
                                <td>{{ $product->unit_id }}</td>
                                <td><a href=""> Editar </a></td>
                                <td><a href=""> Excluir </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $products->appends($request)->links() }}
                <br>
                Exibindo {{ $products->count() }} de {{ $products->total() }} registros encontrados.
            </div>
        </div>
    </div>

@endsection
