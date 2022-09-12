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
        .is-invalide{
            color: #D10024;
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
                    <h3 class="breadcrumb-header">Register Now</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{route('frontend.home')}}">Home</a></li>
                        <li class="active">sign Up</li>
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
                    <form action="{{route('register')}}" method="post" class="billing-details">
                        @csrf
                        <div class="form-group">
                            <input class="input @error('name')is-invalide @endif" type="email" name="name" placeholder="Enter Your User Name">
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
                            <input class="input @error('password_confirmation')is-invalide @endif" type="password" name="password_confirmation" placeholder="Retype  Password">
                            @error('password')
                            <small class="is-invalide">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="primary-btn order-submit btn-block">Sing Up Now</button>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


@endsection
