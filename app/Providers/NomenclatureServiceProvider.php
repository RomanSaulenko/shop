<?php


namespace App\Providers;


use App\Models\Nomenclature;
use App\Repositories\MysqlNomenclatureRepository;
use App\Repositories\NomenclatureRepository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class NomenclatureServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(NomenclatureRepository::class, function(Container $app) {
            return $app->make(MysqlNomenclatureRepository::class);
        });

//        $this->app->bind('nomenclature', function(Container $app) {
//            return $app->make(Nomenclature::class);
//        });
    }
}
