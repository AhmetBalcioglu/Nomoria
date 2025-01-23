<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('page_description')">
    <title>@yield('page_title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @yield('page_head_css')

</head>

<body>
    <script src="{{ asset('jQuery.js') }}"></script>{{-- jQuery --}}
    @include('dashboard.layouts.header._dashboardHeader')
    @yield('content')




    <script>
        let successMessage = @json(session('success'));
        let errorMessages = @json(session('error') ? [session('error')] : []);
    </script>



    @yield('page_body_js')

</body>

</html>