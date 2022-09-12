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
                    <h3 class="breadcrumb-header">Login Now</h3>
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
                <div class="loginForm">
                    <form action="{{route('login')}}" method="post" class="billing-details">
                        @csrf
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
                        <button type="submit" class="primary-btn order-submit btn-block">Sing In Now</button>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


@endsection
