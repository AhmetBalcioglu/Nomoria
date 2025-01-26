@extends('dashboard.master')

@section('page_title', 'Restoran Yöneticisi Sayfası - Nomoria')

@section('page_description', 'Restoran kontrol paneli')

@section('page_head_css')



@endsection

@section('content')

    @include('dashboard.layouts.restaurantAnalytics._restaurantAnalytics')

@endsection

@section('page_body_js')



@endsection
