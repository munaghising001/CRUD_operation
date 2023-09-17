<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Apr 2023 03:56:47 GMT -->

<head>

    <meta charset="utf-8" />
    <title>CRM | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <script src="{{ asset('assets1/js/layout.js') }}"></script>
    <link href="{{ asset('assets1/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets1/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets1/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset1/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets1/plugins/toastr.min.css')}}">

    <link href="{{ asset('assets1/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>


<body>

@include('includes.header')
@include('includes.sidebar')
@yield('content')

     <!-- JAVASCRIPT -->
     <script src="{{ asset('assets1/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('assets1/libs/simplebar/simplebar.min.js') }}"></script>
     <script src="{{ asset('assets1/libs/node-waves/waves.min.js') }}"></script>
     <script src="{{ asset('assets1/libs/feather-icons/feather.min.js') }}"></script>
     <script src="{{ asset('assets1/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
     <script src="{{ asset('assets1/js/plugins.js') }}"></script>
 
     <script src="{{ asset('assets1/libs/apexcharts/apexcharts.min.js') }}"></script>
 
     <script src="{{ asset('assets1/js/pages/dashboard-crm.init.js') }}"></script>
 
     <script src="{{ asset('assets1/js/app.js') }}"></script>
     <script src="{{asset('assets1/plugins/toastr.min.js')}}"></script>

     <script src="{{ asset('assets1/libs/sweetalert2/sweetalert2.min.js')}}"></script>
     <script src="{{ asset('assets1/js/bootbox/bootbox.min.js') }}"></script>
     <script src="{{ asset('assets1/js/bootbox/bootbox.locales.min.js') }}"></script>

 </body>
 </html>
 