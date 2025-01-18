@extends('layouts.master')

@section('page_title', 'Ana Sayfa - Nomoria')

@section('page_description', 'Nomoria ana sayfasıdır.')

@section('page_head_css')

@vite('resources/css/home/_home.scss')

@endsection

@section('content')

@include('layouts.sections.home._home')

@endsection

@section('page_body_js')

@vite('resources/js/home/_home.js')

@endsection