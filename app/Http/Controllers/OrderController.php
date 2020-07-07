<?php


namespace App\Http\Controllers;


use App\Http\Requests\Order\Store;
use App\Modules\ShoppingBasket\Facades\Basket;

class OrderController extends Controller
{
    public function createOrder()
    {
        $basketProducts = Basket::content();
        $total = Basket::total();

        return view('client.order.create', compact('basketProducts', 'total'));
    }

    public function store(Store $request)
    {

    }
}
