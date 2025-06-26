@extends('site.layouts.base')

@section('title', 'Sobre nós')

@section('content')
    <div class="content-page">
        <div class="title-page">
            <h1>Olá, somos o Super Gestão</h1>
        </div>

        <div class="info-page">
            <p>O Super Gestão é o sistema online de controle administrativo que pode transformar e potencializar os
                negócios da sua empresa.</p>
            <p>Desenvolvido com a mais alta tecnologia para você cuidar do que é mais importante, seus negócios!</p>
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