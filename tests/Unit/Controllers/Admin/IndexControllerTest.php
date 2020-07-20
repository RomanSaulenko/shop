<?php


namespace Tests\Unit\Controllers\Admin;


use App\Http\Controllers\Admin\IndexController;
use Illuminate\View\View;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\Admin\IndexController::index
     */
    public function test_index()
    {
        $controller = $this->getController();
        $result = $controller->index();

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @return IndexController
     */
    protected function getController()
    {
        return $this->app->make(IndexController::class);
    }
}
