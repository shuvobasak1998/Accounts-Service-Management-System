@extends('frontend.layout.master')

@section('css')
    <!-- Owl Carousel CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}">
@endsection

@section('content')
    <!-- ***** Welcome Area Start ***** -->
    @include('frontend.pages.partials.welcome-area')
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** our Sevice Area Start ***** -->
    @include('frontend.pages.partials.our-services')
    <!-- ***** About our Sevice Area End ***** -->

    <!-- ***** Our Process Section Area Start ***** -->
    @include('frontend.pages.partials.our-process')
    <!-- ***** Our Process Section Area End ***** -->

    <!-- ***** Our Partner Section Area Start ***** -->
    @include('frontend.pages.partials.our-partner')
    <!-- ***** Our Partner Section Area End ***** -->

    <!-- ***** Customer Review Section Area Start ***** -->
    @include('frontend.pages.partials.customer-review')
    <!-- ***** Customer Review Section Area End ***** -->

    <!-- ***** our Team Section Area Start ***** -->
    @include('frontend.pages.partials.our-team')
    <!-- ***** our Team Section Area End ***** -->

    <!-- ***** Blog Start Section Area Start ***** -->
    @include('frontend.pages.partials.our-blog')
    <!-- ***** Blog End Section Area End ***** -->

    <!-- ***** Contact Us Section Start ***** -->
    @include('frontend.pages.partials.contact-us')
    <!-- ***** Contact Us Section End ***** -->
@endsection

@section('js')
    <!-- jQuery & Owl Carousel JS CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".partner-carousel").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                dots: true,
                autoplay: true,
                autoplayTimeout: 2000,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            });
        });
        $(document).ready(function () {
            $(".review-carousel").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                dots: false,
                autoplay: false,
                autoplayTimeout: 4000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>
@endsection
