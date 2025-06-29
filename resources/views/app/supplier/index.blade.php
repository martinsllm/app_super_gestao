@extends('app.layouts.base')

@section('title', 'Fornecedor')

@section('content')

    <div class="content-page">
        <div class="title-page-2">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('supplier.create') }}"> Novo </a></li>
            </ul>
        </div>

        <div class="info-page">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('supplier.list') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Nome" class="black-border">
                    <input type="text" name="uf" placeholder="UF" class="black-border">
                    <input type="text" name="email" placeholder="E-mail" class="black-border">
                    <button type="submit" class="black-border">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>

@endsection