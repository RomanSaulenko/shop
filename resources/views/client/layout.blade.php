<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>shopsaul</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    </head>
    <body>

        <header>
            <div class="collapse bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">About</h4>
                            <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">Contact</h4>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                                <li><a href="#" class="text-white">Like on Facebook</a></li>
                                <li><a href="#" class="text-white">Email me</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark box-shadow">
                <div class="container d-flex justify-content-between">
                    <a href="{{route('index')}}" class="navbar-brand d-flex align-items-center">
                        <strong>{{ config('app.name') }}</strong>
                    </a>


                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-secondary border-right" >
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">3</span>
                        </button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <div class="row total-header-section border-bottom">
                                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                    <p>Total: <span class="text-info">$2,978.24</span></p>
                                </div>
                            </div>
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="https://images-na.ssl-images-amazon.com/images/I/811OyrCd5hL._SX425_.jpg" class="img-fluid">
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>Sony DSC-RX100M..</p>
                                    <span class="price text-info"> $250.22</span> <span class="count"> Quantity:01</span>
                                </div>
                            </div>
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="https://images-na.ssl-images-amazon.com/images/I/811OyrCd5hL._SX425_.jpg" class="img-fluid">
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>Sony DSC-RX100M..</p>
                                    <span class="price text-info"> $250.22</span> <span class="count"> Quantity:01</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                    <button class="btn btn-primary btn-block">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </header>

        @yield('header')

        <div class="row">
            @yield('sidebar')

            @yield('content')
        </div>


        <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                    <a href="#">Back to top</a>
                </p>
                <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
                <p>New to Bootstrap? <a href="../../..">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
            </div>
        </footer>

{{--        <script src="{{mix('js/vendor.js')}}"></script>--}}
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/cart/Cart.js')}}"></script>
    </body>
</html>
