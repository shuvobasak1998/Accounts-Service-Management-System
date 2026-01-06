<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
  integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('backend/theme/plugins/material/css/materialdesignicons.min.css') }}">
<link href="{{ asset('backend/theme/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/theme/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/theme/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
<link href="{{ asset('backend/theme/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />

<!-- MONO CSS -->
<link id="main-css-href" rel="stylesheet" href="{{ asset('backend/theme/css/style.css') }}" />

<!-- FAVICON -->
<link href="{{ asset('backend/theme/images/favicon.png') }}" rel="shortcut icon" />
<script src="{{ asset('backend/theme/plugins/nprogress/nprogress.js') }}"></script>

<!-- App Css-->
@yield('css')
<!-- Style -->
<link id="main-css-href" rel="stylesheet" href="{{ asset('backend/theme/css/style.css') }}" />
<link href="{{ URL::asset('/backend/css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />

@yield('css-bottom')
