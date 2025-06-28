@if (isset($product->id))
    <form method="post" action="{{ route('product.update', ['product' => $product->id]) }}">
        @csrf
        @method('PUT')
@else
        <form method="post" action="{{ route('product.store') }}">
            @csrf
    @endif
        <input type="text" name="name" value="{{ $product->name ?? old('name') }}" placeholder="Nome"
            class="black-border">
        @include('site.layouts._partials.error', ['field_name' => 'name'])

        <input type="text" name="description" value="{{ $product->description ?? old('description') }}"
            placeholder="Descrição" class="black-border">
        @include('site.layouts._partials.error', ['field_name' => 'description'])

        <input type="number" name="weight" value="{{ $product->weight ?? old('weight') }}" placeholder="Peso"
            class="black-border">
        @include('site.layouts._partials.error', ['field_name' => 'weight'])

        <select name="unit_id">
            <option>-- Selecione a Unidade de Medida --</option>

            @foreach ($units as $unit)
                <option value="{{ $unit->id }}" {{ ($product->unit_id ?? old('unit_id')) == $unit->id ? 'selected' : '' }}>
                    {{ $unit->description }}</option>
            @endforeach
        </select>
        @include('site.layouts._partials.error', ['field_name' => 'unit_id'])

        <button type=" submit" class="black-border">Cadastrar</button>
    </form>