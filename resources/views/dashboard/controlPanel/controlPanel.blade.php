@extends('dashboard.master')

@section('page_title', 'Restoran Yöneticisi Sayfası - Nomoria')

@section('page_description', 'Restoran kontrol paneli')

@section('page_head_css')

    @vite('resources/css/dashboard/_controlPanel.scss')

@endsection

@section('content')

    @include('dashboard.layouts.controlPanel._controlPanel')

@endsection

@section('page_body_js')



@endsection
