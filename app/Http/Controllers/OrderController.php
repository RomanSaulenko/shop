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

    public function store(Store $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect(route(''));
    }
}
