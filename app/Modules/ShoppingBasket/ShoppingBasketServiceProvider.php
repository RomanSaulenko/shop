<?php

namespace App\Modules\ShoppingBasket;

use Illuminate\Auth\Events\Logout;
use Illuminate\Session\SessionManager;
use Illuminate\Support\ServiceProvider;

class ShoppingBasketServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('shopping_basket', Basket::class);

        $this->app['events']->listen(Logout::class, function () {
            if ($this->app['config']->get('shopping_basket.destroy_on_logout')) {
                $this->app->make(SessionManager::class)->forget('shopping_basket');
            }
        });
    }
}
