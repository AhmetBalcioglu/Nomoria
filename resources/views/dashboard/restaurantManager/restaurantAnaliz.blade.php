@extends('dashboard.master')

@section('page_title', 'Restoran Yöneticisi Sayfası - Nomoria')

@section('page_description', 'Restoran Yöneticisi Sayfası')

@section('page_head_css')

 <!-- @vite('resources/css/restaurantManager/_restaurantManager.scss')   -->

@endsection

@section('content')

@include('dashboard.layouts.restaurantManager._restaurantAnaliz')

@endsection

@section('page_body_js')

 <!-- @vite('resources/js/restaurantManager/_restaurantManager.js')  -->

@endsection