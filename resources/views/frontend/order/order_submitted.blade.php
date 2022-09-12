@extends('frontend.master')
@push('css')
    <style>
        .loginForm{
            width: 95%;
            margin: 0 auto;
            border: 1px solid black;
            padding: 20px;
            box-shadow: 0 0 5px 2px rgb(0 0 0 / 18%);
            text-align: center;
        }

    </style>
@endpush
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
{{--        <div class="container">--}}
{{--            <!-- row -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h3 class="breadcrumb-header">Login Now</h3>--}}
{{--                    <ul class="breadcrumb-tree">--}}
{{--                        <li><a href="{{route('frontend.home')}}">Home</a></li>--}}
{{--                        <li class="active">sign in</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /row -->--}}
{{--        </div>--}}
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="loginForm">
                   <h2>Congratulation Your Order Submitted. We are contract with you as soon as possible</h2>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


@endsection
