@extends('layouts.master')

@section('page_title', 'Detay - Nomoria')

@section('page_description', 'Nomoria detay sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/discount/_discount.scss')

@endsection

@section('content')

    @include('layouts.sections.discount._discount')

@endsection

@section('page_body_js')

    @vite('resources/js/discount/_discount.js')

@endsection
