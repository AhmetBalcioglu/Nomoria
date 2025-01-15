@extends('layouts.master')
<link rel="shortcut icon" href="images/favicon.png" type="">
@section('page_title', 'Detay - Nomoria')

@section('page_description', 'Nomoria detay sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/details/_show_details.scss')

@endsection

@section('content')

    @include('layouts.sections.details._show_details')

@endsection

@section('page_body_js')



@endsection
