@extends('layouts.master')

@section('page_title', 'Login - Nomoria')

@section('page_description', 'Nomoria login sayfasıdır.')

@section('page_head_css')

@endsection

@section('content')

    @include('layouts.sections.login._login')

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
