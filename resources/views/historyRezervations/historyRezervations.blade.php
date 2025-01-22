@extends('layouts.master')

@section('page_title', 'Geçmiş Rezervasyonlarım - Nomoria')

@section('page_description', 'Nomoria geçmiş rezervasyon sayfasıdır.')

@section('page_head_css')

@vite('resources/css/historyRezervations/_historyRezervations.scss')

@endsection

@section('content')

@include('layouts.sections.historyRezervations._historyRezervations')

@endsection

@section('page_body_js')


@vite('resources/js/historyRezervations/_historyRezervations.js')

@endsection