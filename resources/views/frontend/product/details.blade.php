@extends('frontend.master')
@push('css')
    <style>
        .wishlistActive {
            color: #D10024;
            /*border-radius: 50%;*/
            background: none;
            border: none;
        }
    </style>
@endpush
@section('content')
    <div class="">
        <!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb-tree">
                            <li><a href="{{route('frontend.home')}}">Home</a></li>
                            <li><a href="{{route('frontend.category-product',$product->category->slug)}}">{{$product->category->name}}</a></li>
                            <li class="active">{{$product->name}}</li>
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
                    <!-- Product main img -->
                    <div class="col-md-5 col-md-push-2">
                        <div id="product-main-img">
                                <div class="product-preview">
                                    <img src="{{asset('/uploads/'.$product->image)}}" alt="">
                                </div>
{{--                            <div class="product-preview">--}}
{{--                                <img src="{{asset('/')}}assets/frontend/img/product03.png" alt="">--}}
{{--                            </div>--}}

{{--                            <div class="product-preview">--}}
{{--                                <img src="{{asset('/')}}assets/frontend/img/product06.png" alt="">--}}
{{--                            </div>--}}

{{--                            <div class="product-preview">--}}
{{--                                <img src="{{asset('/')}}assets/frontend/img/product08.png" alt="">--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <!-- /Product main img -->

                    <!-- Product thumb imgs -->
                    <div class="col-md-2  col-md-pull-5">
                        <div id="product-imgs">
                                <div class="product-preview">
                                    <img src="{{asset('/uploads/'.$product->image)}}" alt="">
                                </div>
{{--                            <div class="product-preview">--}}
{{--                                <img src="{{asset('/')}}assets/frontend/img/product03.png" alt="">--}}
{{--                            </div>--}}

{{--                            <div class="product-preview">--}}
{{--                                <img src="{{asset('/')}}assets/frontend/img/product06.png" alt="">--}}
{{--                            </div>--}}

{{--                            <div class="product-preview">--}}
{{--                                <img src="{{asset('/')}}assets/frontend/img/product08.png" alt="">--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <!-- /Product thumb imgs -->

                    <!-- Product details -->
                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name">{{$product->name}}</h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <a class="review-link" href="#">10 Review(s) | Add your review</a>
                            </div>
                            <div>
                                <h3 class="product-price">Tk. {{$product->price}} <del class="product-old-price">Tk. {{$product->price + 20}}</del></h3>
                                <span class="product-available">
                                    @if($product->stock_status == 'in-stock')
                                        IN STOCK
                                    @else
                                        OUT OF STOCK
                                    @endif
                                </span>
                            </div>
                            <p>{!! $product->short_description !!}</p>

                            <div class="product-options">
                                <label>
                                    Size
                                    <select class="input-select">
                                        <option value="0">X</option>
                                    </select>
                                </label>
                                <label>
                                    Color
                                    <select class="input-select">
                                        <option value="0">Red</option>
                                    </select>
                                </label>
                            </div>

                            <div class="add-to-cart">
                                <form action="{{route('frontend.add-to-cart')}}" method="post">
                                    @csrf
                                    <div class="qty-label">
                                        Qty
                                        <div class="input-number">
                                            <input type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}">
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <span class="qty-up">+</span>
                                            <span class="qty-down">-</span>
                                        </div>
                                    </div>
                                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                </form>

                            </div>

                            <ul class="product-btns">

                                @auth
                                    <form id="addToWishlist{{$product->id}}" action="{{route('frontend.add-to-wishlist')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="add_to_wish" value="true">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                    </form>

                                    <a style="cursor: pointer;padding-right: 15px;"
                                        onclick="event.preventDefault();document.getElementById('addToWishlist{{$product->id}}').submit();"
                                        class="add-to-wishlist {{optional(checkWishList($product->id) )->is_wish == 1 ? 'wishlistActive' : ''}}">
                                        <i class="fa fa-heart-o"></i>
                                        <span class="tooltipp">add to wishlist
                                                </span></a>
                                @else
                                    <button

                                        class="add-to-wishlist {{optional(checkWishList($product->id) )->is_wish == 1 ? 'wishlistActive' : ''}}">
                                        <i class="fa fa-heart-o"></i>
                                        <span class="tooltipp">Login First
                                                </span></button>
                                @endauth

                                <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                            </ul>

                            <ul class="product-links">
                                <li>Category:</li>
                                <li><a href="{{route('frontend.category-product',$product->category->slug)}}">{{$product->category->name}}</a></li>
{{--                                <li><a href="#">Accessories</a></li>--}}
                            </ul>

                            <ul class="product-links">
                                <li>Share:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- /Product details -->

                    <!-- Product tab -->
                    <div class="col-md-12">
                        <div id="product-tab">
                            <!-- product tab nav -->
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                <li><a data-toggle="tab" href="#tab2">Details</a></li>
                                <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                            </ul>
                            <!-- /product tab nav -->

                            <!-- product tab content -->
                            <div class="tab-content">
                                <!-- tab1  -->
                                <div id="tab1" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab1  -->

                                <!-- tab2  -->
                                <div id="tab2" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>{!! $product->details !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /tab2  -->

                                <!-- tab3  -->
                                <div id="tab3" class="tab-pane fade in">
                                    <div class="row">
                                        <!-- Rating -->
                                        <div class="col-md-3">
                                            <div id="rating">
                                                <div class="rating-avg">
                                                    <span>4.5</span>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <ul class="rating">
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div style="width: 80%;"></div>
                                                        </div>
                                                        <span class="sum">3</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div style="width: 60%;"></div>
                                                        </div>
                                                        <span class="sum">2</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <div class="rating-progress">
                                                            <div></div>
                                                        </div>
                                                        <span class="sum">0</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /Rating -->

                                        <!-- Reviews -->
                                        <div class="col-md-6">
                                            <div id="reviews">
                                                <ul class="reviews">
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">John</h5>
                                                            <p class="date">27 DEC 2018, 8:0 PM</p>
                                                            <div class="review-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">John</h5>
                                                            <p class="date">27 DEC 2018, 8:0 PM</p>
                                                            <div class="review-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">John</h5>
                                                            <p class="date">27 DEC 2018, 8:0 PM</p>
                                                            <div class="review-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="reviews-pagination">
                                                    <li class="active">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /Reviews -->

                                        <!-- Review Form -->
                                        <div class="col-md-3">
                                            <div id="review-form">
                                                <form class="review-form">
                                                    <input class="input" type="text" placeholder="Your Name">
                                                    <input class="input" type="email" placeholder="Your Email">
                                                    <textarea class="input" placeholder="Your Review"></textarea>
                                                    <div class="input-rating">
                                                        <span>Your Rating: </span>
                                                        <div class="stars">
                                                            <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                            <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                            <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                            <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                            <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                        </div>
                                                    </div>
                                                    <button class="primary-btn">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /Review Form -->
                                    </div>
                                </div>
                                <!-- /tab3  -->
                            </div>
                            <!-- /product tab content  -->
                        </div>
                    </div>
                    <!-- /product tab -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- Section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3 class="title">Related Products</h3>
                        </div>
                    </div>

                    @foreach($relatedProduct as $r_product)
                    <!-- product -->
                        <div class="col-md-3 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{asset('uploads/'.$r_product->image)}}" alt="">
                                    <div class="product-label">
                                        <span class="sale">- {{$r_product->discount}} %</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$r_product->category->name}}</p>
                                    <h3 class="product-name"><a href="#">{{$r_product->name}}</a></h3>
                                    <h4 class="product-price">Tk . {{$r_product->price}} <del class="product-old-price">Tk. {{$r_product->price + 20}}</del></h4>
                                    <div class="product-rating">
                                    </div>
                                    <div class="product-btns">
                                        @auth
                                            <form id="addToWishlist{{$r_product->id}}" action="{{route('frontend.add-to-wishlist')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="add_to_wish" value="true">
                                                <input type="hidden" name="product_id" value="{{$r_product->id}}">
                                            </form>

                                            <button
                                                onclick="event.preventDefault();document.getElementById('addToWishlist{{$r_product->id}}').submit();"
                                                class="add-to-wishlist {{optional(checkWishList($r_product->id) )->is_wish == 1 ? 'wishlistActive' : ''}}">
                                                <i class="fa fa-heart-o"></i>
                                                <span class="tooltipp">add to wishlist
                                                </span></button>
                                        @else
                                            <button

                                                class="add-to-wishlist {{optional(checkWishList($r_product->id) )->is_wish == 1 ? 'wishlistActive' : ''}}">
                                                <i class="fa fa-heart-o"></i>
                                                <span class="tooltipp">Login First
                                                </span></button>
                                        @endauth

                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                        <a href="{{route('frontend.product-details',$r_product->slug)}}" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"></span></a>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <form action="{{route('frontend.add-to-cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="id" value="{{$r_product->id}}">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /Section -->
    </div>
@endsection
