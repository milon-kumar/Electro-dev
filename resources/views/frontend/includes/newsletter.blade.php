
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form action="{{route('frontend.subscribe')}}" method="post">
                        @csrf
                        <input class="input" type="email" name="email" placeholder="Enter Your Email">

                        <button type="submit" class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        <br>
                        <br>
                        @error('subscribe_email')
                        <small style="color: #D10024;">{{$message}}</small>
                        @enderror
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
