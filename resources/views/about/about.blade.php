@extends('layouts.master')

@section('page_title', 'Hakkımızda - Nomoria')

@section('page_description', 'Nomoria hakkımızda sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/about/_about.scss')

@endsection

@section('content')

    @include('layouts.sections.about._about')

@endsection

@section('page_body_js')

@endsection
