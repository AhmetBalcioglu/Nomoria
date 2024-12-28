<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('page_description')">
    <title>@yield('page_title')</title>

    <link rel="stylesheet" href="{{ asset('HomePage_css/page_head.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('page_head_css')



</head>



<body>

    @if (session('success'))
        <script>
            setTimeout(function() {
                $('.alert-success').fadeOut(500);
            }, 5000);
        </script>
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <script>
            setTimeout(function() {
                $('.alert-danger').fadeOut(500);
            }, 5000);
        </script>
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> {{-- jQuery
    --}}

    @yield('page_body_js')

</body>

</html>
