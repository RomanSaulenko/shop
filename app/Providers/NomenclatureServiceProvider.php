<?php


namespace App\Providers;


use App\Models\Nomenclature;
use App\Repositories\NomenclatureRepositoryMysql;
use App\Repositories\NomenclatureRepository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class NomenclatureServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(NomenclatureRepository::class, function(Container $app) {
            return $app->make(NomenclatureRepositoryMysql::class);
        });
    }
}
