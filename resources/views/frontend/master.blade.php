<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('/')}}assets/frontend/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('/')}}assets/frontend/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/')}}assets/frontend/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('/')}}assets/frontend/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('/')}}assets/frontend/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('/')}}assets/frontend/css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('css')
</head>
<body>

@include('sweetalert::alert')
<!-- HEADER -->
    @include('frontend.includes.header')
<!-- /HEADER -->

<!-- NAVIGATION -->
@include('frontend.includes.nav')
<!-- /NAVIGATION -->

<!--MAIN-SECTION-->
    @yield('content')
<!--MAIN-SECTION-->

<!-- NEWSLETTER -->
    @include('frontend.includes.newsletter')
<!-- /NEWSLETTER -->

<!-- FOOTER -->
    @include('frontend.includes.footer')
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{asset('/')}}assets/frontend/js/jquery.min.js"></script>
<script src="{{asset('/')}}assets/frontend/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}assets/frontend/js/slick.min.js"></script>
<script src="{{asset('/')}}assets/frontend/js/nouislider.min.js"></script>
<script src="{{asset('/')}}assets/frontend/js/jquery.zoom.min.js"></script>
<script src="{{asset('/')}}assets/frontend/js/main.js"></script>
@stack('js')
</body>
</html>
