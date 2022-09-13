
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">

                <li><a href="#"><i class="fa fa-money"></i> BDT</a></li>
                @guest
                    <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login</a></li>
                    <li><a href="{{route('register')}}"><i class="fa fa-registered"></i> Register</a></li>
                @endguest
                @auth
                    <li><a href="#"><i class="fa fa-user-o"></i>Profile</a></li>
                    <li>
                        <a href="" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">
                            <i class="fa fa-sign-out"></i>
                            Logout</a>
                    </li>

                    <form id="logoutForm" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                @endauth
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{route('frontend.home')}}" class="logo">
                            <img src="{{asset('/')}}assets/frontend/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{route('frontend.search')}}" method="get">
                            <select name="category_id" class="input-select">
                                @foreach(searchCategory() as $category)
                                    <option value="{{$category->id}}">{{Str::limit($category->name,12)}}</option>
                                @endforeach
                            </select>
                            <input class="input" name="query" placeholder="Search here">
                            <button type="submit" class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        @auth
                            <!-- Wishlist -->
                            <div>
                                <a href="{{route('frontend.wishlist')}}">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Your Wishlist</span>
                                    <div class="qty">{{wishlistCountbyUser()}}</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->
                        @endauth
                        <!-- Cart -->
                        <div class="dropdown">
                            <a style="cursor: pointer;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">{{cartProducts()->count()}}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">

                                    @php($sum = 0)
                                    @foreach(cartProducts() as $c_product)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{asset('/uploads/'.$c_product->attributes->image)}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">{{$c_product->name}}</a></h3>
                                                <h4 class="product-price"><span class="qty">{{$c_product->quantity}}x</span>Tk.{{$c_product->price}}</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>
                                        @php($sum = $sum + $c_product->price)
                                    @endforeach
                                </div>
                                <div class="cart-summary">
                                    <small>{{cartProducts()->count()}} Item(s) selected</small>
                                    <h5>SUBTOTAL: Tk .{{$sum }}</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">View Cart</a>
                                    <a href="{{route('frontend.checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
