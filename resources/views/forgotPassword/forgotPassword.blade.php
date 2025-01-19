@extends('layouts.master')

@section('page_title', 'Forgot Password - Nomoria')

@section('page_description', 'Nomoria Forgot Password sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/forgotPassword/_forgotPassword.scss')

@endsection

@section('content')

    @include('layouts.sections.forgotPassword._forgotPassword')

@endsection

@section('page_body_js')

@endsection
