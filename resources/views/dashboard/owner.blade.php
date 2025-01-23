@extends('dashboard.master')

@section('page_title', 'Dashboard - Nomoria')

@section('page_description', 'Nomoria dashboard sayfasıdır.')

@section('page_head_css')



@endsection

@section('content')

    @include('dashboard.layouts.owner._ownerDashboard')



@endsection
