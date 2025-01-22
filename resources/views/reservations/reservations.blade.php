@extends('layouts.master')

@section('page_title', 'Rezervasyon - Nomoria')

@section('page_description', 'Nomoria rezervasyon sayfasıdır.')

@section('page_head_css')

@vite('resources/css/reservations/_reservations.scss')

@endsection

@section('content')

@include('layouts.sections.reservations._reservations')

@endsection

@section('page_body_js')

@vite('resources/js/reservations/_reservations.js')

@endsection