@extends('layouts.master')

@section('page_title', 'Admin Panel - Nomoria')

@section('page_description', 'Nomoria Admin sayfasıdır.')

@section('page_head_css')

<!-- Değişcek @vite('resources/css/details/_details.scss') -->

@endsection

@section('content')

    @include('layouts.sections.adminPanel._adminPanel')

@endsection

@section('page_body_js')

<!-- Değişcek @vite('resources/js/details/_details.js') -->

@endsection


