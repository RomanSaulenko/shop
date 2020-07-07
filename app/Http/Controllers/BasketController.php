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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basketCheckout()
    {
        $basketProducts = Cart::content();

        return view('client.basket.index', compact('basketProducts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dropdown()
    {
        $basketProducts = Cart::content();
        $total = Cart::total();

        return view('client.basket.dropdown', compact('total', 'basketProducts'));
    }

    public function deleteCartItem(string $rowId)
    {
        Cart::remove($rowId);

        return response(null, 204);
    }
}
