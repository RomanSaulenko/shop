<?php


namespace App\Http\Controllers;


use App\Http\Requests\Order\Store;
use App\Modules\ShoppingBasket\Facades\Cart;
use App\Services\OrderService;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    protected $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function createOrder()
    {
        $basketProducts = Cart::content();
        $total = Cart::total();

        return view('client.order.create', compact('basketProducts', 'total'));
    }

    public function orderCreated()
    {
        $orderId = session('order_created_id');

        if (!$orderId) {
            return redirect(route('index'));
        }
        $order = $this->service->getOrder($orderId);

        $total = $order->products->reduce(function($res, $product) {
            return $res + $product->price * $product->quantity;
        }, 0);

        Cart::destroy();

        return view('client.order.created', compact('total'));
    }

    public function store(Store $request)
    {
        $data = $request->validated();
        $order = $this->service->store($data);

        session()->flash('order_created_id', $order->id);

        return redirect(route('order.created'));
    }
}
