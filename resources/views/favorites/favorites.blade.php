@extends('layouts.master')

@section('page_title', 'Favoriler - Nomoria')

@section('page_description', 'Nomoria favoriler sayfasıdır.')

@section('page_head_css')
<!-- 
    @vite('resources/css/discount/_discount.scss') -->

@endsection

@section('content')

@include('layouts.sections.favorites._favorites')

@endsection

@section('page_body_js')

@vite('resources/js/favorites/_favorites.js')

@endsection