<?php


namespace App\Http\Requests\Order;


use App\Modules\ShoppingBasket\Facades\Cart;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function prepareForValidation()
    {
        $data = $this->validationData();

    }

    public function rules()
    {
        return [
            'client.name' => 'required',
            'client.phone' => 'required|phone:RU,AUTO',
            'client.email' => 'required|email',
        ];
    }

    protected function getBasketItems()
    {
        return Cart::content();
    }
}
