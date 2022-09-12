@extends('frontend.master')
@push('css')
    <style>
        .loginForm{
            width: 50%;
            margin: 0 auto;
            border: 1px solid black;
            padding: 20px;
            box-shadow: 0 0 5px 2px rgb(0 0 0 / 18%);
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
                    <h3 class="breadcrumb-header">Your Wishlist Product</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{route('frontend.home')}}">Home</a></li>
                        <li class="active">sign in</li>
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
                @foreach($wishlist as $w_product)
                    {{$w_product}}
{{--                    <div class="col-md-3 col-xs-6">--}}
{{--                        <div class="product">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="{{asset('uploads/'.$w_product->image)}}" alt="">--}}
{{--                                <div class="product-label">--}}
{{--                                    <span class="sale">- {{$w_product->discount}} %</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-body">--}}
{{--                                <p class="product-category">{{$w_product->category->name}}</p>--}}
{{--                                <h3 class="product-name"><a href="#">{{$w_product->name}}</a></h3>--}}
{{--                                <h4 class="product-price">Tk . {{$w_product->price}} <del class="product-old-price">Tk. {{$w_product->price + 20}}</del></h4>--}}
{{--                                <div class="product-rating">--}}
{{--                                </div>--}}
{{--                                <div class="product-btns">--}}
{{--                                    @auth--}}
{{--                                        <form id="addToWishlist{{$r_product->id}}" action="{{route('frontend.add-to-wishlist')}}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="add_to_wish" value="true">--}}
{{--                                            <input type="hidden" name="product_id" value="{{$r_product->id}}">--}}
{{--                                        </form>--}}
{{--    --}}
{{--                                        <button--}}
{{--                                            onclick="event.preventDefault();document.getElementById('addToWishlist{{$r_product->id}}').submit();"--}}
{{--                                            class="add-to-wishlist {{optional(checkWishList($r_product->id) )->is_wish == 1 ? 'wishlistActive' : ''}}">--}}
{{--                                            <i class="fa fa-heart-o"></i>--}}
{{--                                            <span class="tooltipp">add to wishlist--}}
{{--                                                    </span></button>--}}
{{--                                    @else--}}
{{--                                        <button--}}
{{--    --}}
{{--                                            class="add-to-wishlist {{optional(checkWishList($r_product->id) )->is_wish == 1 ? 'wishlistActive' : ''}}">--}}
{{--                                            <i class="fa fa-heart-o"></i>--}}
{{--                                            <span class="tooltipp">Login First--}}
{{--                                                    </span></button>--}}
{{--                                    @endauth--}}
{{--    --}}
{{--                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>--}}
{{--                                    <a href="{{route('frontend.product-details',$r_product->slug)}}" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"></span></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="add-to-cart">--}}
{{--                                <form action="{{route('frontend.add-to-cart')}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="quantity" value="1">--}}
{{--                                    <input type="hidden" name="id" value="{{$r_product->id}}">--}}
{{--                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


@endsection
