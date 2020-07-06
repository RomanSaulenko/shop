<?php


namespace App\Http\Controllers;


use App\Http\Requests\Cart\Add;
use App\Modules\ShoppingBasket\Facades\Cart;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addItemToCart(Add $request)
    {
        $options = $request->options;

        $model = app($options['model'])->find($request->productId);

        Cart::add($model);
    }

    public function list()
    {
        $basketProducts = Cart::content();

        return view('client.basket.index', compact('basketProducts'));
    }
}
