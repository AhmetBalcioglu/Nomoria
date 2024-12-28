@extends('layouts.master')

@section('page_title', 'Forgot Password - Nomoria')

@section('page_description', 'Nomoria Forgot Password sayfasıdır.')

@section('page_head_css')

@endsection

@section('content')

    @include('layouts.sections.newPassword._newPassword')

@endsection

@section('page_body_js')
    <script>
        function showPassword() {
            var passwordInput = document.getElementById('password');
            var passwordConfirmationInput = document.getElementById('password_confirmation');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordConfirmationInput.type = 'text';
            } else {
                passwordInput.type = 'password';
                passwordConfirmationInput.type = 'password';
            }

        }
    </script>
@endsection
