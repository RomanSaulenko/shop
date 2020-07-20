<?php


namespace Tests\Unit\Controllers\Admin;


use App\Exceptions\DataAlreadyExists;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Requests\Admin\Client\Store as StoreOrderRequest;
use App\Models\Order\Client;
use App\Services\ClientService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Mockery\MockInterface;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\Admin\ClientController::index
     */
    public function test_index()
    {
        $this->mock(ClientService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getClients')->once();
        });

        $controller = $this->getController();
        $result = $controller->index();

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Admin\ClientController::edit
     */
    public function test_edit()
    {
        $this->mock(ClientService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getClient')->once();
        });

        $controller = $this->getController();
        $result = $controller->edit(1);

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Admin\ClientController::store
     */
    public function test_store_success()
    {
        $this->mock(ClientService::class, function (MockInterface $mock) {
            $mock->shouldReceive('createOrUpdateClient')->once();
        });
        $this->mock(StoreOrderRequest::class, function (MockInterface $mock) {
            $mock
                ->shouldReceive('validated')
                ->once()
                ->andReturn(['client' => []]);
        });
        $storeRequest = $this->app->make(StoreOrderRequest::class);

        $controller = $this->getController();
        $result = $controller->store($storeRequest);

        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Admin\ClientController::store
     */
    public function test_store_exception()
    {
        $this->mock(ClientService::class, function (MockInterface $mock) {
            $mock
                ->shouldReceive('createOrUpdateClient')
                ->once()
                ->andThrowExceptions([new DataAlreadyExists()]);
        });
        $this->mock(StoreOrderRequest::class, function (MockInterface $mock) {
            $mock
                ->shouldReceive('validated')
                ->once()
                ->andReturn(['client' => []]);
        });
        $storeRequest = $this->app->make(StoreOrderRequest::class);

        $controller = $this->getController();
        $result = $controller->store($storeRequest);

        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Admin\ClientController::delete
     */
    public function test_delete_success()
    {
        $client = factory(Client::class)->create();

        $controller = $this->getController();
        $result = $controller->delete($client->id);

        $this->assertInstanceOf(Response::class, $result);
    }

    /**
     * @return ClientController
     */
    protected function getController()
    {
        return app(ClientController::class);
    }
}
