@extends('app.layouts.base')

@section('title', 'Produto')

@section('content')

    <div class="content-page">
        <div class="title-page-2">
            <p>Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}"> Voltar </a></li>
                <li><a href=""> Consulta </a></li>
            </ul>
        </div>

        <div class="info-page">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="text-align:left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <td>Peso:</td>
                        <td>{{ $product->weight }} kg</td>
                    </tr>
                    <tr>
                        <td>Unidade Medida:</td>
                        <td>{{ $product->unit_id }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection