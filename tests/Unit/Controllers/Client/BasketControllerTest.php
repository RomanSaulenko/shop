<?php


namespace Tests\Unit\Controllers\Client;


use App\Http\Controllers\Client\BasketController;
use App\Http\Requests\Basket\AddItem;
use App\Models\Nomenclature;
use App\Modules\ShoppingBasket\Facades\Cart;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Mockery\MockInterface;
use Tests\TestCase;

class BasketControllerTest extends TestCase
{
    /**
     * @covers \App\Http\Controllers\Client\BasketController::addItemToCart
     */
    public function test_addItemToCart_success()
    {
        Cart::shouldReceive('add')
            ->once();

        $this->mock(AddItem::class, function (MockInterface $mock) {
            $mock
                ->shouldReceive('validated')
                ->once()
                ->andReturn(['options' => ['model' => Nomenclature::class], 'productId' => 1])
            ;
        });

        $controller = $this->getController();
        $request = $this->app->make(AddItem::class);
        $result = $controller->addItemToCart($request);

        $this->assertInstanceOf(Response::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Client\BasketController::basketCheckout
     */
    public function test_basketCheckout()
    {
        Cart::shouldReceive(['content' => 1, 'total' => 2, 'count' => 3])
            ->once();

        $controller = $this->getController();
        $result = $controller->basketCheckout();

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Client\BasketController::dropdown
     */
    public function test_dropdown()
    {
        Cart::shouldReceive(['content' => 1, 'total' => 2])
            ->once();

        $controller = $this->getController();
        $result = $controller->dropdown();

        $this->assertInstanceOf(View::class, $result);
    }

    /**
     * @covers \App\Http\Controllers\Client\BasketController::deleteCartItem
     */
    public function test_deleteCartItem()
    {
        Cart::shouldReceive('remove')
            ->once();

        $controller = $this->getController();
        $result = $controller->deleteCartItem(2);

        $this->assertInstanceOf(Response:: class, $result);
    }

    /**
     * @return BasketController
     */
    protected function getController()
    {
        return $this->app->make(BasketController::class);
    }
}
