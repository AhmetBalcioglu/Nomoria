@extends('layouts.master')

@section('page_title', 'Forgot Password - Nomoria')

@section('page_description', 'Nomoria Forgot Password sayfasıdır.')

@section('page_head_css')

@vite('resources/css/newPassword/_newPassword.scss')

@endsection

@section('content')

@include('layouts.sections.newPassword._newPassword')

@endsection

@section('page_body_js')

@vite('resources/js/newPassword/_newPassword.js')

@endsection