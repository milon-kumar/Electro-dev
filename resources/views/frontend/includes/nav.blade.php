
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="{{Route::is('frontend.home') ? 'active' : ''}}"><a href="{{route('frontend.home')}}">Home</a></li>
{{--                <li><a href="{{route('frontend.category')}}">Hot Deals</a></li>--}}
                @foreach(headerCategory() as $category)
                    <li class="{{Request::is('frontend/category-product/'.$category->slug) ? 'active' : ''}}"><a href="{{route('frontend.category-product',$category->slug)}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
