@extends('frontend.master')

@section('content')
    <div class="">
        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- shop -->
                    @foreach($latestThreeCategory as $category)
                        <div class="col-md-4 col-xs-6">
                            <div class="shop">
                                <div class="shop-img">
                                    <img src="{{asset('uploads/'.$category->image)}}" alt="">
                                </div>
                                <div class="shop-body">
                                    <h3>{{$category->name}}</h3>
                                    <a href="{{route('frontend.category-product',$category->slug)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <!-- /shop -->
                    @endforeach
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    @foreach($randomCategory as $r_category)
                                        <li class="">
                                            <a href="{{route('frontend.category-product',$r_category->slug)}}">{{$r_category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">
                                       @foreach($newProduct as $n_product)
                                        <!-- product -->

                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{asset('uploads/'.$n_product->image)}}" alt="">
                                                <div class="product-label">
                                                    <span class="sale" style="margin-left: 4px;"> -{{$n_product->discount}}% </span>
                                                    @if($n_product->product_feature == 'new')
                                                        <span class="new" style="margin-left: 2px;">NEW</span>
                                                    @elseif($n_product->product_feature == 'sell')
                                                        <span class="new" style="margin-left: 2px;">SELL</span>
                                                    @elseif($n_product->product_feature == 'hot')
                                                        <span class="new" style="margin-left: 2px;">HOT</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$n_product->category->name}}</p>
                                                <h3 class="product-name">
                                                    <a href="#">{{$n_product->name}}</a>
                                                </h3>
                                                <h4 class="product-price">Tk . {{$n_product->price}} <del class="product-old-price">Tk. {{$n_product->price + 20}}</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    @auth
                                                        <form id="addToWishlist{{$n_product->id}}" action="{{route('frontend.add-to-wishlist')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="add_to_wish" value="true">
                                                            <input type="hidden" name="product_id" value="{{$n_product->id}}">
                                                        </form>

                                                        <button
                                                            onclick="event.preventDefault();document.getElementById('addToWishlist{{$n_product->id}}').submit();"
                                                            class="add-to-wishlist {{optional(checkWishList($n_product->id) )->is_wish == 1 ? 'wishlistActive' : ''}}">
                                                            <i class="fa fa-heart-o"></i>
                                                            <span class="tooltipp">add to wishlist
                                                </span></button>
                                                    @else
                                                        <button

                                                            class="add-to-wishlist {{optional(checkWishList($n_product->id) )->is_wish == 1 ? 'wishlistActive' : ''}}">
                                                            <i class="fa fa-heart-o"></i>
                                                            <span class="tooltipp">Login First
                                                </span></button>
                                                    @endauth                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <a href="{{route('frontend.product-details',$n_product->slug)}}" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"></span></a>

                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="{{route('frontend.add-to-cart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="id" value="{{$n_product->id}}">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                </form>

                                            </div>
                                        </div>
                                        <!-- /product -->
                                    @endforeach
                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
                    </div>
                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- HOT DEAL SECTION -->
        <div id="hot-deal" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="hot-deal">
                            <ul class="hot-deal-countdown">
                                <li>
                                    <div>
                                        <h3>02</h3>
                                        <span>Days</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>10</h3>
                                        <span>Hours</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>34</h3>
                                        <span>Mins</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>60</h3>
                                        <span>Secs</span>
                                    </div>
                                </li>
                            </ul>
                            <h2 class="text-uppercase">hot deal this week</h2>
                            <p>New Collection Up to 50% OFF</p>
                            <a class="primary-btn cta-btn" href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /HOT DEAL SECTION -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Top selling</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    @foreach($randomCategory as $r_category)
                                        <li class="">
                                            <a href="{{route('frontend.category-product',$r_category->slug)}}">{{$r_category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab2" class="tab-pane fade in active">
                                    <div class="products-slick" data-nav="#slick-nav-2">
                                        @foreach($topProduct as $t_product)
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="{{asset('uploads/'.$t_product->image)}}" alt="">
                                                    <div class="product-label">
                                                        <span class="sale" style="margin-left: 4px;"> -{{$t_product->discount}}% </span>
                                                        @if($t_product->product_feature == 'new')
                                                            <span class="new" style="margin-left: 2px;">NEW</span>
                                                        @elseif($t_product->product_feature == 'sell')
                                                            <span class="new" style="margin-left: 2px;">SELL</span>
                                                        @elseif($t_product->product_feature == 'hot')
                                                            <span class="new" style="margin-left: 2px;">HOT</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Category</p>
                                                    <h3 class="product-name">
                                                        <a href="#">{{$t_product->name}}</a>
                                                    </h3>
                                                    <h4 class="product-price">Tk . {{$t_product->price}} <del class="product-old-price">Tk. {{$t_product->price + 20}}</del></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        @auth
                                                            <form id="addToWishlist{{$t_product->id}}" action="{{route('frontend.add-to-wishlist')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="add_to_wish" value="true">
                                                                <input type="hidden" name="product_id" value="{{$t_product->id}}">
                                                            </form>

                                                            <button
                                                                onclick="event.preventDefault();document.getElementById('addToWishlist{{$t_product->id}}').submit();"
                                                                class="add-to-wishlist {{optional(checkWishList($t_product->id) )->is_wish == 1 ? 'wishlistActive' : ''}}">
                                                                <i class="fa fa-heart-o"></i>
                                                                <span class="tooltipp">add to wishlist
                                                </span></button>
                                                        @else
                                                            <button

                                                                class="add-to-wishlist {{optional(checkWishList($t_product->id) )->is_wish == 1 ? 'wishlistActive' : ''}}">
                                                                <i class="fa fa-heart-o"></i>
                                                                <span class="tooltipp">Login First
                                                </span></button>
                                                        @endauth                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                        <a href="{{route('frontend.product-details',$t_product->slug)}}" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"></span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{asset('/')}}assets/frontend/img/product07.png" alt="">
                                                <div class="product-label">
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{asset('/')}}assets/frontend/img/product08.png" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                                <div class="product-rating">
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <form action="{{route('frontend.add-to-cart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="id" value="{{$n_product->id}}">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart dddddddddddddddd</button>
                                                </form>

                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{asset('/')}}assets/frontend/img/product09.png" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{asset('/')}}assets/frontend/img/product01.png" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    </div>
                                    <div id="slick-nav-2" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
                    </div>
                    <!-- /Products tab & slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Most Viewed</h4>
                            <div class="section-nav">
                                <div id="slick-nav-3" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-3">
                            @foreach($mostViewed as $key)
                                <div>
                                    @foreach($mostViewed as $product)
                                        <!-- product widget -->
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{asset('uploads/'.$product->image)}}" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">{{$product->category->name}}</p>
                                                    <h3 class="product-name"><a href="{{route('frontend.product-details',$product->slug)}}">{{$product->name}}</a></h3>
                                                    <h4 class="product-price">Tk . {{$t_product->price}} <del class="product-old-price">Tk. {{$t_product->price + 20}}</del></h4>
                                                </div>
                                            </div>
                                        <!-- /product widget -->
                                        @endforeach
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="col-md-4 col-xs-6">


                        <div class="section-title">
                            <h4 class="title">Top selling</h4>
                            <div class="section-nav">
                                <div id="slick-nav-4" class="products-slick-nav"></div>
                            </div>
                        </div>



                        <div class="products-widget-slick" data-nav="#slick-nav-4">
                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product04.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product05.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product06.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- product widget -->
                            </div>

                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product07.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product08.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product09.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- product widget -->
                            </div>
                        </div>


                    </div>



                    <div class="clearfix visible-sm visible-xs"></div>

                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Most Order</h4>
                            <div class="section-nav">
                                <div id="slick-nav-5" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-5">
                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product01.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product02.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product03.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- product widget -->
                            </div>

                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product04.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product05.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{asset('/')}}assets/frontend/img/product06.png" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                    </div>
                                </div>
                                <!-- product widget -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
    </div>
@endsection
