@extends('dashboard.master')

@section('page_title', 'Restoran Ekleme Sayfası - Nomoria')

@section('page_description', 'Restoran Ekleme paneli')

@section('page_head_css')

@vite('resources/css/restaurantInsert/_restaurantInsert.scss')


@endsection

@section('content')

@include('dashboard.layouts.restaurantInsert._restaurantInsert')

@endsection

@section('page_body_js')

@vite('resources/js/restaurantInsert/_restaurantInsert.js')

@endsection