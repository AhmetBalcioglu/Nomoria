@extends('dashboard.master')

@section('page_title', 'Restorant Panel - Nomoria')

@section('page_description', 'Nomoria Restorant Panel Sayfasıdır.')

@section('page_head_css')

@vite('resources/css/restaurantPanel/_restaurantPanel.scss')

@endsection

@section('content')

@include('dashboard.layouts.restaurantPanel._restaurantPanel')

@endsection

@section('page_body_js')

@vite('resources/js/restaurantPanel/_restaurantPanel.js')

@endsection