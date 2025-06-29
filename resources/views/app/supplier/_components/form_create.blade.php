@if(isset($supplier->id))
    <form method="post" action="{{ route('supplier.update', ['supplier' => $supplier->id]) }}">
        @csrf
        @method('PUT')
@else
        <form method="post" action="{{ route('supplier.store') }}">
            @csrf
    @endif
        <input type="hidden" name="id" value={{ $supplier->id ?? ''}}>
        @csrf
        <input type="text" name="name" value="{{ $supplier->name ?? old('name') }}" placeholder="Nome"
            class="black-border">
        @include('site.layouts._partials.error', ['field_name' => 'name'])

        <input type="text" name="uf" value="{{ $supplier->uf ?? old('uf') }}" placeholder="UF" class="black-border">
        @include('site.layouts._partials.error', ['field_name' => 'uf'])

        <input type="text" name="email" value="{{ $supplier->email ?? old('email') }}" placeholder="E-mail"
            class="black-border">
        @include('site.layouts._partials.error', ['field_name' => 'email'])

        <button type="submit" class="black-border">Cadastrar</button>
    </form>