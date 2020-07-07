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


                    <div class="btn-group shopping-basket">
                        <a type="button" class="btn btn-secondary border-right" href="{{route('basket.checkout')}}" >
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> {{__('common.Basket')}} <span class="badge badge-pill badge-danger">{{$basketCount}}</span>
                        </a>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" onclick="Cart.dropdown();"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right " id="basket-dropdown">

                        </div>
                    </div>


                </div>
            </div>
        </header>

        @yield('header')

        <div class="container">
            @yield('sidebar')

            @yield('content')
        </div>


        <footer class="page-footer">
                <div class="container-fluid bg-light d-flex justify-content-between  mh-100">
                    <!-- Footer Links -->
                    <div class="container text-center text-md-left  p-3">

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column -->
                            <div class="col-md-6 mt-md-0 mt-3">

                                <!-- Content -->
                                <h5 class="text-uppercase">Footer Content</h5>

                            </div>
                            <!-- Grid column -->


                            <!-- Grid column -->
                            <div class="col-md-3 mb-md-0 mb-3">

                                <!-- Links -->
                                <h5 class="text-uppercase">Сервис и помощь</h5>

                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#!">Link 1</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 2</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 3</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 4</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 5</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 6</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 7</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 8</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 mb-md-0 mb-3">

                                <!-- Links -->
                                <h5 class="text-uppercase">Информация</h5>

                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#!">Link 1</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 2</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 3</a>
                                    </li>
                                    <li>
                                        <a href="#!">Link 4</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                    </div>



                </div>
        </footer>

        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/cart/Cart.js')}}"></script>
    </body>
</html>
