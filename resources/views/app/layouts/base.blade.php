<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('title')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    {{-- Carregando Javascript --}}
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('app.layouts._partials.top')
    @yield('content')
</body>

</html>