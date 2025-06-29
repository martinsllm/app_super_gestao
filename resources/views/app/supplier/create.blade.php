@extends('app.layouts.base')

@section('title', 'Fornecedor')

@section('content')

    <div class="content-page">
        <div class="title-page-2">
            <p>Novo Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('supplier.index')}}"> Voltar </a></li>
            </ul>
        </div>

        <div class="info-page">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.supplier._components.form_create')
                @endcomponent
            </div>
        </div>
    </div>

@endsection