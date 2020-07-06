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

    $router->group(['prefix' => 'categories'], function(Router $router) {
        $router->get('/{categoryId}', 'NomenclatureController@getProductsForCategory')->name('category.products');
        $router->get('/products/{productId}', 'NomenclatureController@getProductById')->name('category.product');
    });

    $router->group(['prefix' => '/basket'], function(Router $router) {
        $router->get('/', 'BasketController@basketCheckout')->name('basket.checkout');
        $router->get('add', 'BasketController@addItemToCart');
    });

});

$router->group(['prefix' => 'client', ], function(Router $router) {
    $router->get('login', 'Client\Auth\LoginController@showLoginForm')->name('client.login');
    $router->get('register', 'Client\Auth\RegisterController@showRegistrationForm')->name('client.register');
    $router->get('password/reset', 'Client\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $router->get('password/reset/{token}', 'Client\Auth\ResetPasswordController@showResetForm')->name('password.reset');

    $router->post('login', 'Client\Auth\LoginController@login');
    $router->post('logout', 'Client\Auth\LoginController@logout')->name('logout');

    $router->post('register', 'Client\Auth\RegisterController@register');

    $router->post('password/email', 'Client\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $router->post('password/reset', 'Client\Auth\ResetPasswordController@reset')->name('password.update');

});
