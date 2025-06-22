{{$slot}}
<form action={{ route('site.contact') }} method="post">
    @csrf
    <input name="name" value="{{ old('name')}}" type="text" placeholder="Nome" class="{{ $class }}">
    <br>
    <input name="phone" value="{{ old('phone')}}" type="text" placeholder="Telefone" class="{{ $class }}">
    <br>
    <input name="email" value="{{ old('email')}}" type="text" placeholder="E-mail" class="{{ $class }}">
    <br>
    <select name="reason_contact_id" class="{{ $class }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($reason_contacts as $key => $reason_contact)
            <option value="{{ $reason_contact->id }}" @if (old('reason_contact_id') == $reason_contact->id) {{ 'selected' }}
            @endif>
                {{ $reason_contact->reason_contact }}
            </option>
        @endforeach

    </select>
    <br>
    <textarea name="message"
        class="{{ $class }}">{{ (old('message') != '') ? old('message') : 'Preencha aqui a sua mensagem' }} </textarea>
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>

<div style="position:absolute; top:0px; left:0px; width:100%; background:red">
    <pre>
        {{print_r($errors)}}
    </pre>
</div>