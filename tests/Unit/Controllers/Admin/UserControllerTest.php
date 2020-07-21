<?php


namespace Tests\Unit\Controllers\Admin;


use App\Exceptions\DataAlreadyExists;
use App\Http\Controllers\Admin\UserController;
use App\Http\Requests\Admin\Client\Store as StoreOrderRequest;
use App\Models\Order\Client;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Mockery\MockInterface;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\Admin\UserController::index
     */
    public function test_index()
    {
        $this->mock(UserService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getUsers')->once();
        });

        $controller = $this->getController();
        $result = $controller->index();

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Admin\UserController::edit
     */
    public function test_edit()
    {
        $this->mock(UserService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getUser')->once();
        });

        $controller = $this->getController();
        $result = $controller->edit(1);

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Admin\UserController::store
     */
    public function test_store_success()
    {
        $this->mock(UserService::class, function (MockInterface $mock) {
            $mock->shouldReceive('createOrUpdate')->once();
        });
        $this->mock(StoreOrderRequest::class, function (MockInterface $mock) {
            $mock
                ->shouldReceive('validated')
                ->once()
                ->andReturn(['user' => []]);
        });
        $storeRequest = $this->app->make(StoreOrderRequest::class);

        $controller = $this->getController();
        $result = $controller->store($storeRequest);

        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Admin\UserController::store
     */
    public function test_store_exception()
    {
        $this->mock(UserService::class, function (MockInterface $mock) {
            $mock
                ->shouldReceive('createOrUpdate')
                ->once()
                ->andThrowExceptions([new DataAlreadyExists()]);
        });
        $this->mock(StoreOrderRequest::class, function (MockInterface $mock) {
            $mock
                ->shouldReceive('validated')
                ->once()
                ->andReturn(['user' => []]);
        });
        $storeRequest = $this->app->make(StoreOrderRequest::class);

        $controller = $this->getController();
        $result = $controller->store($storeRequest);

        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Admin\UserController::delete
     */
    public function test_delete_success()
    {
        $client = factory(Client::class)->create();

        $controller = $this->getController();
        $result = $controller->delete($client->id);

        $this->assertInstanceOf(Response::class, $result);
    }

    /**
     * @return UserController
     */
    protected function getController()
    {
        return app(UserController::class);
    }
}
