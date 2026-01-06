<!doctype html>
<html lang="en">

<head>
  @include('backend.layouts.title-meta')
  @include('backend.layouts.head')
  @livewireStyles
</head>
@section('body')

  <body class="bg-light-gray" id="body">
    <!-- preloader -->
    <div id="preloader">
      <div id="loader"></div>
    </div>
    <!-- end preloader -->
  @show
  @yield('content')
  @livewireScripts
  @include('backend.layouts.vendor-scripts')
</body>

</html>
