<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 15:06:42 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Dashboard | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}assets/backend/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('/')}}assets/backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/')}}assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/')}}assets/backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    @stack("css")
</head>

<body data-sidebar="dark">

@include('sweetalert::alert')
<!-- Begin page -->
<div id="layout-wrapper">
        @include('backend.includes.header')
        @include('backend.includes.sidebar')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @yield('content')

</div>
<!-- END layout-wrapper -->

{{--<!-- Right Sidebar -->--}}
{{--<div class="right-bar">--}}
{{--    <div data-simplebar class="h-100">--}}
{{--        <div class="rightbar-title px-3 py-4">--}}
{{--            <a href="javascript:void(0);" class="right-bar-toggle float-right">--}}
{{--                <i class="mdi mdi-close noti-icon"></i>--}}
{{--            </a>--}}
{{--            <h5 class="m-0">Settings</h5>--}}
{{--        </div>--}}

{{--        <!-- Settings -->--}}
{{--        <hr class="mt-0" />--}}
{{--        <h6 class="text-center mb-0">Choose Layouts</h6>--}}

{{--        <div class="p-4">--}}
{{--            <div class="mb-2">--}}
{{--                <img src="{{asset('/')}}assets/backend/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">--}}
{{--            </div>--}}
{{--            <div class="custom-control custom-switch mb-3">--}}
{{--                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />--}}
{{--                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>--}}
{{--            </div>--}}

{{--            <div class="mb-2">--}}
{{--                <img src="{{asset('/')}}assets/backend/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">--}}
{{--            </div>--}}
{{--            <div class="custom-control custom-switch mb-3">--}}
{{--                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="{{asset('/')}}assets/backend/css/bootstrap-dark.min.css" data-appStyle="{{asset('/')}}assets/backend/css/app-dark.min.css" />--}}
{{--                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>--}}
{{--            </div>--}}

{{--            <div class="mb-2">--}}
{{--                <img src="{{asset('/')}}assets/backend/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">--}}
{{--            </div>--}}
{{--            <div class="custom-control custom-switch mb-5">--}}
{{--                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="{{asset('/')}}assets/backend/css/app-rtl.min.css" />--}}
{{--                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>--}}
{{--            </div>--}}


{{--        </div>--}}

{{--    </div> <!-- end slimscroll-menu-->--}}
{{--</div>--}}
{{--<!-- /Right-bar -->--}}

{{--<!-- Right bar overlay-->--}}
{{--<div class="rightbar-overlay"></div>--}}

<!-- JAVASCRIPT -->
<script src="{{asset('/')}}assets/backend/libs/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('/')}}assets/backend/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="{{asset('/')}}assets/backend/libs/apexcharts/apexcharts.min.js"></script>

<script src="{{asset('/')}}assets/backend/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="{{asset('/')}}assets/backend/js/app.js"></script>

@stack('js')
</body>


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 15:07:20 GMT -->
</html>
