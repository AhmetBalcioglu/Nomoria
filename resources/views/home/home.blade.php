@extends('layouts.master')

@section('page_title', 'Ana Sayfa - Nomoria')

@section('page_description', 'Nomoria ana sayfasıdır.')

@section('page_head_css')

    <style>
        .slider {
            width: 100%;
            height: 500px;
            overflow: hidden;
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        * {
            font-size: 62, 5%;
        }

        .fixed-right {
            position: fixed;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1000;
        }
    </style>

@endsection

@section('content')

    {{-- @include('home.deneme') --}}
    @include('layouts.sections.home._home')

@endsection

@section('page_body_js')

@endsection
