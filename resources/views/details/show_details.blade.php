@extends('layouts.master')

@section('page_title', 'Detay - Nomoria')

@section('page_description', 'Nomoria detay sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/details/_show_details.scss')

@endsection

@section('content')

    @include('layouts.sections.details._show_details')

@endsection

@section('page_body_js')

@vite('resources/js/details/_show_details.js')


@endsection
