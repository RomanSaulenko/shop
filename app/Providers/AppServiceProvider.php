<?php

namespace App\Providers;

use App\Modules\ShoppingBasket\Facades\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('client.layouts.base', function ($view) {
            $basketCount = Cart::count() ? Cart::count() : 0;
            $view->with('basketCount', $basketCount);
        });
    }
}
