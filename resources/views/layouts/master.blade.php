<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('page_description')">
    <link rel="shortcut icon" href="img/favicon.png" type="">
    <title>

        @yield('page_title')</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js']) {{-- Bütün sayfalarda çağrılan SCSS ve JS'ler --}}

    @yield('page_head_css') {{-- Sayfaya özel SCSS'ler --}}

</head>

<body>

    <script src="{{ asset('jQuery.js') }}"></script>{{-- jQuery --}}
    <script src="//code.jivosite.com/widget/IRUzibtaUY" async></script> {{-- Chatbot --}}

    {{------------ Content ------------}}
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    {{-- ------------------------------}}

    <script>
        let successMessage = @json(session('success'));
        let errorMessages = @json(session('error') ? [session('error')] : []);
    </script>



    @yield('page_body_js') {{-- Sayfaya özel JS'ler --}}

</body>

</html>