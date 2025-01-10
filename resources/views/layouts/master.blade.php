<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('page_description')">
    <title>@yield('page_title')</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @yield('page_head_css')
</head>

<body>
    @include('layouts.header')
    {{-- Eğer session'da bir mesaj varsa ekrana yazsın --}}
    @if (session('success'))
        <script>
            setTimeout(function () {
                $('.alert-success').fadeOut(500);
            }, 5000);
        </script>
        <div class="alert alert-success" style="position: absolute; top: 0; left: 0; z-index: 9999;width: 100%;height: 60px;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" style="position: absolute; top: 0; left: 0; z-index: 9999;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
    @include('layouts.footer')

    <script src="{{ asset('jQuery.js') }}"></script>{{-- jQuery --}}

    @yield('page_body_js')

</body>

</html>