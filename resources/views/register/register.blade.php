@extends('layouts.master')

@section('page_title', 'Register - Nomoria')

@section('page_description', 'Nomoria register sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/register/_register.scss')

@endsection

@section('content')

    @include('layouts.sections.register._register')

@endsection

@section('page_body_js')
    <script>
        function showPassword() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
@endsection
