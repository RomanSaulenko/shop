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

$router->group(['prefix' => '/', 'namespace' => 'Client'], function(Router $router) {

    $router->get('/', 'IndexPageController@index')->name('index');

    $router->group(['prefix' => 'categories'], function(Router $router) {
        $router->get('/{categoryId}', 'NomenclatureController@getProductsForCategory')->name('category.products');
        $router->get('/products/{productId}', 'NomenclatureController@getProductById')->name('category.product');
    });

    $router->group(['prefix' => '/basket'], function(Router $router) {
        $router->get('/', 'BasketController@basketCheckout')->name('basket.checkout');
        $router->get('add', 'BasketController@addItemToCart');
        $router->get('dropdown', 'BasketController@dropdown');

        $router->delete('cart_item/{rowId}', 'BasketController@deleteCartItem');
    });

    $router->group(['prefix' => '/order'], function(Router $router) {
        $router->get('/', 'OrderController@createOrder')->name('order.create');
        $router->get('/created', 'OrderController@orderCreated')->name('order.created');

        $router->post('/', 'OrderController@store')->name('order.store');
    });

    $router->group(['prefix' => 'client', 'namespace' => 'Auth'], function(Router $router) {
        $router->get('login', 'LoginController@showLoginForm')->name('client.login');
        $router->get('register', 'RegisterController@showRegistrationForm')->name('client.register');
        $router->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $router->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');

        $router->post('login', 'LoginController@login');
        $router->post('logout', 'LoginController@logout')->name('logout');

        $router->post('register', 'Client\Auth\RegisterController@register');

        $router->post('password/email', 'Client\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $router->post('password/reset', 'Client\Auth\ResetPasswordController@reset')->name('password.update');
    });

});

$router->group(['prefix' => 'admin', 'namespace' => 'Admin'], function(Router $router) {
    $router->get('/', 'IndexController@index')->name('admin.index');

    $router->group(['prefix' => '/clients'], function(Router $router) {
        $router->get('/', 'ClientController@index')->name('admin.client.index');
        $router->get('/{id}', 'ClientController@edit')->name('admin.client.edit');

        $router->post('/', 'ClientController@store')->name('admin.client.store');
    });
});


