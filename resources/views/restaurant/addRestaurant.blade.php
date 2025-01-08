@extends('layouts.master')

@section('page_title', 'Restoran Ekle - Nomoria')

@section('page_description', 'Nomoria Restoran ekleme sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/restaurant/_add.scss')

@endsection

@section('content')

    @include('layouts.sections.addRestaurant._addRestaurant')

@endsection

@section('page_body_js')

@endsection
