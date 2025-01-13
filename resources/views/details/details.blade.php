@extends('layouts.master')
<link rel="shortcut icon" href="images/favicon.png" type="">
@section('page_title', 'Detay - Nomoria')

@section('page_description', 'Nomoria detay sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/details/_details.scss')

@endsection

@section('content')

    @include('layouts.sections.details._details')

@endsection

@section('page_body_js')

    @vite('resources/js/details/_details.js')

@endsection
