@extends('frontend.master')
@push('css')
    <style>
        .is-invalide{
            color: #D10024;
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
                        <h3 class="breadcrumb-header">Checkout</h3>
                        <ul class="breadcrumb-tree">
                            <li><a href="{{route('frontend.home')}}">Home</a></li>
                            <li class="active">Checkout</li>
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

                        <div class="col-md-7">
                            @auth
                            <!-- Billing Details -->
                                <div class="billing-details">
                                    <div class="section-title">
                                        <h3 class="title">Billing address</h3>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="first-name" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="last-name" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="address" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="city" placeholder="City">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="country" placeholder="Country">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="tel" name="tel" placeholder="Telephone">
                                    </div>
                                </div>


                                <!-- Shiping Details -->
                                <div class="shiping-details">
                                    <div class="section-title">
                                        <h3 class="title">Shiping address</h3>
                                    </div>
                                    <div class="input-checkbox">
                                        <input type="checkbox" id="shiping-address">
                                        <label for="shiping-address">
                                            <span></span>
                                            Ship to a diffrent address?
                                        </label>
                                        <div class="caption">
                                            <div class="form-group">
                                                <input class="input" type="text" name="first-name" placeholder="First Name">
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="text" name="last-name" placeholder="Last Name">
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="email" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="text" name="address" placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="text" name="city" placeholder="City">
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="text" name="country" placeholder="Country">
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="tel" name="tel" placeholder="Telephone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Shiping Details -->

                                <!-- Order notes -->
                                <div class="order-notes">
                                    <textarea class="input" placeholder="Order Notes"></textarea>
                                </div>
                                <!-- /Order notes -->
                            @endauth
                            @guest
                                    <div class="section-title">
                                        <h5 class="title">Signup Or Login For Your Order</h5>
                                        <div class="section-nav">
                                            <ul class="section-tab-nav tab-nav">
                                                <li class="active"><a data-toggle="tab" href="#tab1">Sign Up</a></li>
                                                <li><a data-toggle="tab" href="#tab2">Login Now</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="products-tabs">
                                        <!-- tab -->
                                        <div id="tab1" class="tab-pane active">
                                            <form action="{{route('register')}}" method="post" class="billing-details">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="checkout" value="true">
                                                    <input class="input @error('name')is-invalide @endif" type="text" name="name" placeholder="Enter Your Name">
                                                    @error('name')
                                                    <small class="is-invalide">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input class="input @error('email')is-invalide @endif" type="email" name="email" placeholder="Enter Your Email">
                                                    @error('email')
                                                    <small class="is-invalide">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input class="input @error('password')is-invalide @endif" type="password" name="password" placeholder="Enter Password">
                                                    @error('password')
                                                    <small class="is-invalide">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input class="input @error('password_confirmation')is-invalide @endif" type="password" name="password_confirmation" placeholder="Retype Password">
                                                    @error('password_confirmation')
                                                    <small class="is-invalide">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="primary-btn order-submit btn-block">Sing Up Now</button>
                                            </form>
                                            <div id="slick-nav-1" class="products-slick-nav"></div>
                                        </div>
                                        <!-- /tab -->

                                        <!-- tab -->
                                        <div id="tab2" class="tab-pane ">
                                            <form action="{{route('login')}}" method="post" class="billing-details">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="checkout" value="true">
                                                    <input class="input @error('email')is-invalide @endif" type="email" name="email" placeholder="Enter Your Email">
                                                    @error('email')
                                                    <small class="is-invalide">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input class="input @error('password')is-invalide @endif" type="password" name="password" placeholder="Enter Password">
                                                    @error('password')
                                                    <small class="is-invalide">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="primary-btn order-submit btn-block">Sing In Now</button>
                                            </form>
                                            <div id="slick-nav-1" class="products-slick-nav"></div>
                                        </div>
                                        <!-- /tab -->
                                    </div>
                            @endguest
                        </div>

                        <!-- Order Details -->
                        <div class="col-md-5 order-details">
                            <div class="section-title text-center">
                                <h3 class="title">Your Order</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>PRODUCT</strong></div>
                                    <div><strong>TOTAL</strong></div>
                                </div>
                                <div class="order-products">
                                    @foreach($cartProducts as $c_product)
                                        <div class="order-col">
                                            <div>{{$c_product->quantity}} x {{$c_product->name}}</div>
                                            <div>Tk. {{$c_product->price}}</div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="order-col">
                                    <div>Shiping</div>
                                    <div><strong>FREE</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>TOTAL</strong></div>
                                    <div><strong class="order-total">Tk . {{$total}}</strong></div>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="input-radio">
                                    <input type="radio" name="payment" id="payment-1">
                                    <label for="payment-1">
                                        <span></span>
                                        Direct Bank Transfer
                                    </label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="payment" id="payment-2">
                                    <label for="payment-2">
                                        <span></span>
                                        Cheque Payment
                                    </label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="payment" id="payment-3">
                                    <label for="payment-3">
                                        <span></span>
                                        Paypal System
                                    </label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="terms">
                                <label for="terms">
                                    <span></span>
                                    I've read and accept the <a href="#">terms & conditions</a>
                                </label>
                            </div>
                            <button type="submit" class="primary-btn order-submit btn-block">Place order</button>
{{--                            <button type="submit" {{auth()->check() ? '' : 'disabled'}} class="primary-btn order-submit btn-block">Place order</button>--}}
                        </div>
                        <!-- /Order Details -->
                    </div>
                    <!-- /row -->
                </div>


            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- NEWSLETTER -->
        <!-- /NEWSLETTER -->

    </div>
@endsection
