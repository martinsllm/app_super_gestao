@extends('app.layouts.base')

@section('title', 'Fornecedor')

@section('content')

    <div class="content-page">
        <div class="title-page-2">
            <p>Novo Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.supplier.add') }}"> Novo </a></li>
                <li><a href="{{ route('app.supplier') }}"> Consulta </a></li>
            </ul>
        </div>

        <div class="info-page">
            {{ $msg }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.supplier.add') }}">
                    @csrf
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nome" class="black-border">
                    @include('site.layouts._partials.error', ['field_name' => 'name'])

                    <input type="text" name="uf" value="{{ old('uf') }}" placeholder="UF" class="black-border">
                    @include('site.layouts._partials.error', ['field_name' => 'uf'])

                    <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="black-border">
                    @include('site.layouts._partials.error', ['field_name' => 'email'])

                    <button type="submit" class="black-border">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection