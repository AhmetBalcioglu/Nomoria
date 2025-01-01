<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('page_description')">
    <title>@yield('page_title')</title>

    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    @yield('page_head_css')

</head>



<body>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> {{-- jQuery --}}

    {{-- Eğer session'da bir mesaj varsa ekrana yazsın --}}
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



    @yield('page_body_js')

</body>

</html>
