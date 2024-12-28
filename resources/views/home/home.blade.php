@extends('layouts.master')

@section('page_title', 'Ana Sayfa - Nomoria')

@section('page_description', 'Nomoria ana sayfasıdır.')

@section('page_head_css')

@endsection

@section('content')

    {{-- @include('home.deneme') --}}
    @include('layouts.sections.home._home')

@endsection

@section('page_body_js')

@endsection
