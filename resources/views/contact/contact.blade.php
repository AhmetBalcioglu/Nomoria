@extends('layouts.master')

@section('page_title', 'Contact Us - Nomoria')

@section('page_description', 'Nomoria contact sayfasıdır.')

@section('page_head_css')

    @vite('resources/css/contact/_contact.scss')

@endsection

@section('content')

    @include('layouts.sections.contact._contact')

@endsection

@section('page_body_js')

@endsection
