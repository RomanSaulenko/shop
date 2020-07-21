<?php


namespace Tests\Unit\Controllers\Client;


use App\Http\Controllers\Client\IndexPageController;
use App\Repositories\CategoryRepository;
use Illuminate\View\View;
use Mockery\MockInterface;
use Tests\TestCase;

class IndexPageControllerTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\Client\IndexPageController::index
     */
    public function test_index()
    {
        $this->mock(CategoryRepository::class, function(MockInterface $mock){
            $mock->shouldReceive('getCategoriesByParentId');
        });
        $controller = $this->getController();
        $result = $controller->index();

        $this->assertInstanceOf(View::class, $result);
    }

    protected function getController()
    {
        return $this->app->make(IndexPageController::class);
    }
}
