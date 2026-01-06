@extends('frontend.layout.master')


@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}">
@endsection
@section('content')
    <!-- ***** Welcome Area Start ***** -->
    @include('frontend.pages.partials.hero-area')
    <!-- ***** Welcome Area End ***** -->
    
    <!-- ***** About Us Area Start ***** -->
    @include('frontend.pages.partials.about-us')
    <!-- ***** About Us Area Start ***** -->

    <!-- ***** Our Vison and Mission Area Start ***** -->
    @include('frontend.pages.partials.vision-mission')
    <!-- ***** Our Vison and Mission Area End ***** -->

    <!-- ***** Our Team Section Area Start ***** -->
    @include('frontend.pages.partials.our-team')
    <!-- ***** our Team Section Area End ***** -->
@endsection

@section('js')
@endsection