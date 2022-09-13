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
                        <li><a href="{{route('frontend.all-category-product')}}">All Categories</a></li>
                        <li class="active"> {{$categoryName->name}} ({{$categoryName->productCount->count()}} Results) </li>
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
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">
                            @foreach($category as $categoryItem)
                                <a href="{{route('frontend.category-product',$categoryItem->slug)}}" style="margin:9px 0; display: block" class="input-checkbox">
                                    {{Str::limit($categoryItem->name,20)}}
                                    <label for="category-{{$categoryItem->id}}">
                                        <small>({{$categoryItem->productCount->count()}})</small>
                                    </label>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Brand</h3>
                        <div class="checkbox-filter">
                            @foreach($brand as $brandItem)
                                <a href="{{route('frontend.brand-product',$brandItem->slug)}}" style="margin:9px 0; display: block" class="input-checkbox">
                                    {{$brandItem->name}}
                                    <label for="category-{{$brandItem->id}}">
                                        <small>({{$brandItem->productCount->count()}})</small>
                                    </label>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>
                        @foreach($topProduct as $t_product)
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('/uploads/'.$t_product->image)}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category"><a href="{{route('frontend.product-details',$t_product->slug)}}">{{$t_product->category->name}} </a></p>
                                    <h3 class="product-name"><a href="{{route('frontend.product-details',$t_product->slug)}}">{{$t_product->name}}</a></h3>
                                    <h4 class="product-price">Tk.{{$t_product->price}} <del class="product-old-price">{{$t_product->price+20 }}</del></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
{{--                            <label>--}}
{{--                                Sort By:--}}
{{--                                <select class="input-select">--}}
{{--                                    <option value="0">Popular</option>--}}
{{--                                    <option value="1">Position</option>--}}
{{--                                </select>--}}
{{--                            </label>--}}

{{--                            <label>--}}
{{--                                Show:--}}
{{--                                <select class="input-select">--}}
{{--                                    <option value="0">20</option>--}}
{{--                                    <option value="1">50</option>--}}
{{--                                </select>--}}
{{--                            </label>--}}
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
{{--                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>--}}
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        @foreach($productByCategory as $c_product)
                        <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('/uploads/'.$c_product->image)}}" alt="">
                                        <div class="product-label">
                                            <span class="sale" style="margin-left: 4px;"> -{{$c_product->discount}}% </span>
                                            @if($c_product->product_feature == 'new')
                                                <span class="new" style="margin-left: 2px;">NEW</span>
                                            @elseif($c_product->product_feature == 'sell')
                                                <span class="new" style="margin-left: 2px;">SELL</span>
                                            @elseif($c_product->product_feature == 'hot')
                                                <span class="new" style="margin-left: 2px;">HOT</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$c_product->category->name}}</p>
                                        <h3 class="product-name"><a href="{{route('frontend.product-details',$c_product->slug)}}">{{$c_product->name}}</a></h3>
                                        <h4 class="product-price">Tk.{{$c_product->price}} <del class="product-old-price">{{$c_product->price+20 }}</del></h4>
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
                                            <a  href="{{route('frontend.product-details',$c_product->slug)}}" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"></span></a>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <form action="{{route('frontend.add-to-cart')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="id" value="{{$c_product->id}}">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    <!-- /store bottom filter -->
                </div>
                    <div class="row mt-5">
                        <div class="col-md-12" style="margin-top: 50px;">
                            {{$productByCategory->links()}}
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
