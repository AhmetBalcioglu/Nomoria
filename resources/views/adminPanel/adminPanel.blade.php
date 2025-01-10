@extends('layouts.master')

@section('page_title', 'Admin Panel - Nomoria')

@section('page_description', 'Nomoria Admin sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/adminPanel/_adminPanel.scss')

@endsection

@section('content')

    @include('layouts.sections.adminPanel._adminPanel')

@endsection

@section('page_body_js')

    @vite('resources/js/adminPanel/_adminPanel.js')

@endsection


