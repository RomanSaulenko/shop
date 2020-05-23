<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>shopsaul</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{mix('css/app.css')}}" rel="stylesheet">

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
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                <strong>Album</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Place for slider</h1>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="row ml-1">
            <div class="col-md-2">
                <label for="productName">Название товара</label>
                <input type="text" name="product_name" id="productName" value="3" class="form-control"/>
            </div>
            <div class="col-md-10">

                <div class="row">
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <a href="">
                                    <img class="card-img-top" width=250 src="//www.lenzapchasti.ru/wp-content/uploads/2018/11/2813_1.jpg-250x275.jpg" alt="Card image cap">
                                </a>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">На страницу товара</button>
                                    </div>
                                    <small class="text-muted">100 руб.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <a href="">
                                    <img class="card-img-top" width=250 src="//www.lenzapchasti.ru/wp-content/uploads/2018/11/2813_1.jpg-250x275.jpg" alt="Card image cap">
                                </a>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">На страницу товара</button>
                                    </div>
                                    <small class="text-muted">100 руб.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <a href="">
                                    <img class="card-img-top" width=250 src="//www.lenzapchasti.ru/wp-content/uploads/2018/11/2813_1.jpg-250x275.jpg" alt="Card image cap">
                                </a>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">На страницу товара</button>
                                    </div>
                                    <small class="text-muted">100 руб.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <a href="">
                                    <img class="card-img-top" width=250 src="//www.lenzapchasti.ru/wp-content/uploads/2018/11/2813_1.jpg-250x275.jpg" alt="Card image cap">
                                </a>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">На страницу товара</button>
                                    </div>
                                    <small class="text-muted">100 руб.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <a href="">
                                    <img class="card-img-top" width=250 src="//www.lenzapchasti.ru/wp-content/uploads/2018/11/2813_1.jpg-250x275.jpg" alt="Card image cap">
                                </a>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">На страницу товара</button>
                                    </div>
                                    <small class="text-muted">100 руб.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
    </div>
</footer>

<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
