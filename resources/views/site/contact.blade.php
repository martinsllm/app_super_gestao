@extends('site.layouts.base')

@section('title', 'Contato')

@section('content')
    <div class="content-page">
        <div class="title-page">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="info-page">
            <div class="main-contact">
                @component('site.layouts._components.form_contact', ['class' => 'black-border', 'reason_contacts' => $reason_contacts])
                <p>A nossa equipe irá analisar sua mensagem e retornaremos o mais breve possível!</p>
                <p>Nosso tempo médio de retorno é de 48 horas.</p>
                @endcomponent
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="links">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="contact-area">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="location">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection