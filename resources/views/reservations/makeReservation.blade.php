@extends('layouts.master')

@section('page_title', 'Rezervasyon - Nomoria')

@section('page_description', 'Nomoria rezervasyon sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/makeReservation/_makeReservation.scss')

@endsection

@section('content')

    @include('layouts.sections.reservations._makeReservation')

@endsection

@section('page_body_js')


@endsection