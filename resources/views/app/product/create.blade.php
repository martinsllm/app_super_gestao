@extends('app.layouts.base')

@section('title', 'Produto')

@section('content')

    <div class="content-page">
        <div class="title-page-2">
            <p>Adicionar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}"> Voltar </a></li>
                <li><a href=""> Consulta </a></li>
            </ul>
        </div>

        <div class="info-page">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('product.store') }}">
                    <input type="hidden" name="id" value="">
                    @csrf
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nome" class="black-border">
                    @include('site.layouts._partials.error', ['field_name' => 'name'])

                    <input type="text" name="description" value="{{ old('description') }}" placeholder="Descrição"
                        class="black-border">
                    @include('site.layouts._partials.error', ['field_name' => 'description'])

                    <input type="number" name="weight" value="{{ old('weight') }}" placeholder="Peso" class="black-border">
                    @include('site.layouts._partials.error', ['field_name' => 'weight'])

                    <select name="unit_id">
                        <option>-- Selecione a Unidade de Medida --</option>

                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}" @if (old('unit_id') == $unit->id) {{ 'selected' }} @endif>
                                {{ $unit->description }}
                            </option>
                        @endforeach
                    </select>
                    @include('site.layouts._partials.error', ['field_name' => 'unit_id'])

                    <button type=" submit" class="black-border">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection