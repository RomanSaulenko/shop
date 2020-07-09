<?php


namespace App\Providers;


use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryMysql;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(OrderRepository::class, function(Container $app) {
            return $app->make(OrderRepositoryMysql::class);
        });
    }
}
