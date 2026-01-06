@extends('frontend.layout.master')


@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}">
@endsection
@section('content')
    <!-- ***** Welcome Area Start ***** -->
    @include('frontend.pages.partials.welcome-area')
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Contact us Area Start ***** -->
    @include('frontend.pages.partials.contact-us')
    <!-- ***** Contact us Area End ***** -->

    <!-- ***** FAQ Area Start ***** -->
    @include('frontend.pages.partials.faq')
    <!-- ***** FAQ Area End ***** -->
@endsection

@section('js')
@endsection