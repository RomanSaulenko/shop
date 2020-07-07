<?php


namespace App\Http\Controllers;


use App\Http\Requests\Basket\AddItem;
use App\Modules\ShoppingBasket\Facades\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addItemToCart(AddItem $request)
    {
        $options = $request->options;

        $model = app($options['model'])->find($request->productId);

        Basket::add($model);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basketCheckout()
    {
        $basketProducts = Basket::content();
        $total = Basket::total();
        $count = Basket::count();

        return view('client.basket.index', compact('basketProducts', 'total', 'count'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dropdown()
    {
        $basketProducts = Basket::content();
        $total = Basket::total();

        return view('client.basket.dropdown', compact('total', 'basketProducts'));
    }

    public function deleteCartItem(string $rowId)
    {
        Basket::remove($rowId);

        return response(null, 204);
    }
}
