<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Routing\Router;

/**
 * @var Router
 */
$router = app(Router::class);

$router->group(['prefix' => '/'], function(Router $router) {

    $router->get('/', 'IndexPageController@index')->name('index');

    $router->group(['prefix' => 'product'], function(Router $router) {
        $router->get('cart/{id}', 'NomenclatureController@cart');
    });

    $router->group(['prefix' => 'categories'], function(Router $router) {
        $router->get('/{categoryId}', 'NomenclatureController@getProductsForCategory')->name('category.products');
        $router->get('/products/{productId}', 'NomenclatureController@getProductById')->name('category.product');
    });

});

$router->group(['prefix' => '/client', ], function(Router $router) {
    $router->get('login', 'Client\Auth\LoginController@showLoginForm');
    $router->get('register', 'Client\Auth\RegisterController@showRegistrationForm');

});



\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
