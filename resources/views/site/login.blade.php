@extends('site.layouts.base')

@section('title', 'Login')

@section('content')
    <div class="content-page">
        <div class="title-page">
            <h1>Login</h1>
        </div>

        <div class="info-page">
            <div style="width:30%; margin-left: auto; margin-right:auto">
                <form action="{{ route('site.login') }}" method="POST">
                    @csrf
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="black-border">
                    @include('site.layouts._partials.error', ['field_name' => 'email'])

                    <input type="password" name="password" placeholder="Senha" class="black-border">
                    @include('site.layouts._partials.error', ['field_name' => 'password'])

                    <button type="submit" class="black-border"> Entrar </button>
                </form>
                {{ isset($error) && $error != '' ? $error : ''}}
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