<!doctype html>
<html lang="en">

<head>
  @include('backend.layouts.title-meta')
  @include('backend.layouts.head')
  @livewireStyles
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
  <script>
    NProgress.configure({
      showSpinner: false
    });
    NProgress.start();
  </script>
  <!--@section('body') -->
    <!-- preloader -->
    <div id="preloader">
      <div id="loader"></div>
    </div>
    <!-- end preloader -->
    {{-- @show --}}
    {{-- <div id="toaster"></div> --}}
    <div class="wrapper">
      <!-- sidebar start -->
      @include('backend.layouts.sidebar')
      <!-- sidebar start -->

      <div class="page-wrapper">
        <!-- topbar start -->
        @include('backend.layouts.topbar')
        <!-- topbar end -->

        <!--CONTENT WRAPPER start-->
        <div class="content-wrapper">
          <div class="content">
            @yield('content')
          </div>
        </div>
        <!--CONTENT WRAPPER end-->

        <!-- Footer Start-->
        @include('backend.layouts.footer')
        <!-- Footer Start-->
      </div>
    </div>

    <!-- Card Offcanvas start -->
    @include('backend.layouts.offcanvas')
    <!-- Card Offcanvas end -->

    <!-- JAVASCRIPT -->
    @livewireScripts
    {{-- @powerGridScripts --}}
    @include('backend.layouts.vendor-scripts')
  </body>

  </html>
  
