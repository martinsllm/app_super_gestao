@extends('app.layouts.base')

@section('title', 'Produto')

@section('content')

    <div class="content-page">
        <div class="title-page-2">
            <p>Editar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}"> Voltar </a></li>
                <li><a href=""> Consulta </a></li>
            </ul>
        </div>

        <div class="info-page">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product._components.form_create', ['product' => $product, 'units' => $units])
                @endcomponent
            </div>
        </div>
    </div>

@endsection