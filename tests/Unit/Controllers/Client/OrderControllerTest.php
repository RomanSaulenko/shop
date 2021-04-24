<?php


namespace Tests\Unit\Controllers\Client;


use App\Http\Controllers\Client\OrderController;
use App\Models\Order\Order;
use App\Modules\ShoppingBasket\Facades\Cart;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Mockery\MockInterface;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\Client\OrderController::createOrder
     */
    public function test_createOrder()
    {
        Cart::shouldReceive(['content' => 1, 'total' => 2]);

        $controller = $this->getController();
        $request = $this->app->make(Request::class);
        $result = $controller->createOrder($request);

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Client\OrderController::orderCreated
     */
    public function test_orderCreated()
    {
        $order = factory(Order::class)->create();

        Session::shouldReceive('get')
            ->andReturn('1');
        $this->mock(OrderService::class, function (MockInterface $mock) use ($order) {
            $mock->shouldReceive('getOrder')
                 ->andReturn($order);
        });
        Cart::shouldReceive('destroy');

        $controller = $this->getController();
        $result = $controller->orderCreated();

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @return OrderController
     */
    protected function getController()
    {
        return $this->app->make(OrderController::class);
    }
}
