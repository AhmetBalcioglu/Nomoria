@extends('layouts.master')

@section('page_title', 'Login - Nomoria')

@section('page_description', 'Nomoria login sayfasıdır.')

@section('page_head_css')

@vite('resources/css/login/_login.scss')

@endsection

@section('content')

@include('layouts.sections.login._login')

@endsection

@section('page_body_js')

@vite('resources/js/login/_login.js')

@endsection