<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.global.css_support')
    @yield('css')
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    @include('frontend.layout.header')

    @yield('content')

    @include('frontend.layout.footer')

    <!-- jQuery -->
    @include('frontend.global.js_support')

    @yield('js')

</body>

</html>
