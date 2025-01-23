@extends('layouts.master')

@section('page_title', 'My Profile - Nomoria')

@section('page_description', 'Nomoria hesabım sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/profile/_profile.scss')

@endsection

@section('content')

@include('layouts.sections.profile._profile')

@endsection

@section('page_body_js')


@endsection
