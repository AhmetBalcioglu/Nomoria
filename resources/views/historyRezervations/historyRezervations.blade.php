@extends('layouts.master')

@section('page_title', 'Geçmiş Rezervasyonlarım - Nomoria')

@section('page_description', 'Nomoria geçmiş rezervasyon sayfasıdır.')

@section('page_head_css')

@endsection

@section('content')

@include('layouts.sections.historyRezervations._historyRezervations')

@endsection

@section('page_body_js')

@endsection