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
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                ... Lista ...
            </div>
        </div>
    </div>

@endsection