@extends('layouts.master')

@section('page_title', 'Geçmiş Rezervasyonlarım - Nomoria')

@section('page_description', 'Nomoria geçmiş rezervasyon sayfasıdır.')

@vite('resources/css/reservations/_reservations.scss')

@section('page_head_css')

@endsection

@section('content')

@include('layouts.sections.historyRezervations._historyRezervations')

@endsection

@section('page_body_js')

@vite('resources/js/reservations/_reservations.js')

@endsection