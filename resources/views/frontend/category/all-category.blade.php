@extends('frontend.master')
@push("css")
    <style>
        .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: #D10024;
            border-color: #E4E7ED;
        }
    </style>
@endpush
@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li><a href="{{route('frontend.all-category-product')}}">All Categories ({{$allCategory->count()}} Result)</a></li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- STORE -->
                <div id="store" class="col-md-12">
                    <div class="row">
                    @foreach($allCategory as $a_category)
                        <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <a href="{{route('frontend.category-product',$a_category->slug)}}">
                                    <div class="shop">

                                        <div class="shop-img">
                                            <img src="{{asset('uploads/'.$a_category->image)}}" alt="">
                                        </div>
                                        <div class="shop-body">
                                            <h3>{{$a_category->name}}</h3>
                                            <a href="{{route('frontend.category-product',$a_category->slug)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    @endforeach
                    <!-- /store bottom filter -->
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12" style="margin-top: 50px;">
                            {{$allCategory->links()}}
                        </div>
                    </div>

                    <!-- /STORE -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
@endsection
