{{$slot}}
<form action={{ route('site.contact') }} method="post">
    @csrf
    <input name="name" value="{{ old('name')}}" type="text" placeholder="Nome" class="{{ $class }}">
    @include('site.layouts._partials.error', ['field_name' => 'name'])

    <input name="phone" value="{{ old('phone')}}" type="text" placeholder="Telefone" id="phone" class="{{ $class }}">
    @include('site.layouts._partials.error', ['field_name' => 'phone'])

    <input name="email" value="{{ old('email')}}" type="text" placeholder="E-mail" class="{{ $class }}">
    @include('site.layouts._partials.error', ['field_name' => 'email'])

    <select name="reason_contact_id" class="{{ $class }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($reason_contacts as $key => $reason_contact)
            <option value="{{ $reason_contact->id }}" @if (old('reason_contact_id') == $reason_contact->id) {{ 'selected' }}
            @endif>
                {{ $reason_contact->reason_contact }}
            </option>
        @endforeach

    </select>
    @include('site.layouts._partials.error', ['field_name' => 'reason_contact_id'])

    <textarea name="message"
        class="{{ $class }}">{{ (old('message') != '') ? old('message') : 'Preencha aqui a sua mensagem' }} </textarea>
    @include('site.layouts._partials.error', ['field_name' => 'message'])

    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>