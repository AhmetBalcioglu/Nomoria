@extends('layouts.master')

@section('page_title', 'Restoran Yöneticisi Sayfası - Nomoria')

@section('page_description', 'Restoran Yöneticisi Sayfası')

@section('page_head_css')

 @vite('resources/css/restaurantManager/_restaurantManager.scss')  

@endsection

@section('content')

@include('layouts.sections.restaurantManager._restaurantManager')

@endsection

@section('page_body_js')

 @vite('resources/js/restaurantManager/_restaurantManager.js') 

@endsection