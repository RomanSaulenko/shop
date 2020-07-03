<?php

namespace App\Modules\ShoppingBucket;

use Illuminate\Auth\Events\Logout;
use Illuminate\Session\SessionManager;
use Illuminate\Support\ServiceProvider;

class ShoppingBucketServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('shopping_bucket', Cart::class);

        $this->app['events']->listen(Logout::class, function () {
            if ($this->app['config']->get('shopping_bucket.destroy_on_logout')) {
                $this->app->make(SessionManager::class)->forget('shopping_bucket');
            }
        });
    }
}
