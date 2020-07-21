<?php


namespace Tests\Unit\Controllers\Client;


use App\Http\Controllers\Client\NomenclatureController;
use App\Http\Requests\Nomenclature\GetProductsForCategory;
use App\Repositories\NomenclatureRepository;
use App\Services\NomenclatureService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Mockery\MockInterface;
use Tests\TestCase;

class NomenclatureControllerTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\Client\NomenclatureController::getProductsForCategory
     */
    public function test_getProductsForCategory()
    {
        $this->mock(Builder::class, function (MockInterface $mock) {
            $mock->shouldReceive('paginate')
                ->andReturn([]);
        });
        $this->mock(NomenclatureService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getProductsForCategory')
                ->andReturn($this->app->make(Builder::class));
        });
        $this->mock(GetProductsForCategory::class, function (MockInterface $mock) {
            $mock->shouldReceive('validated')
                ->andReturn(['filter' => []]);
        });

        $controller = $this->getController();
        $request = $this->app->make(GetProductsForCategory::class);
        $result = $controller->getProductsForCategory($request, 2);

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Client\NomenclatureController::getProductById
     */
    public function test_getProductById()
    {
        $this->mock(NomenclatureRepository::class, function(MockInterface $mock) {
            $mock->shouldReceive('getProduct');
        });
        $controller = $this->getController();
        $result = $controller->getProductById(2);

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @return NomenclatureController
     */
    protected function getController()
    {
        return $this->app->make(NomenclatureController::class);
    }
}
