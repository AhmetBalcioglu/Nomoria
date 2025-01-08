@extends('layouts.master')

@section('page_title' , 'Restoran Ekleme - Nomoria')

@section('page_description', 'Nomoria Restoran Ekleme sayfasıdır.')

@section('page_head_css')

    @vite ('resources/css/addRestaurant/_addRestaurant.scss')

    @section('content')

        @include('layouts.sections.addRestaurant._addRestaurant')

    @endsection



         @vite('resources/js/addRestaurant/addRestaurant.js')






