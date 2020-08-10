<?php


namespace App\Http\Requests\Order;


use App\Adapters\Cart\CartItemToOrderProductAdapter;
use App\Modules\ShoppingBasket\Facades\Cart;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Store extends FormRequest
{
    public function prepareForValidation()
    {
        $nomenclaturesFromCart = Cart::content()->toArray();
        $nomenclaturesToSave = collect();

        foreach ($nomenclaturesFromCart as $nomenclatureFromCart) {
            $nomenclaturesToSave[] = new CartItemToOrderProductAdapter($nomenclatureFromCart);
        }
        if($user = Auth::user()) {
            $userData = $this->get('user');
            $userData['email'] = $user->email;
            $this->merge(['user' => $userData]);
        }
        $this->merge([
            'order_products' => $nomenclaturesToSave->toArray()
        ]);
    }

    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.phone' => 'required|phone:RU,AUTO',
            'user.email' => 'required|email',
            'order_products.*.nomenclature_id' => 'required|exists:nomenclatures,id',
            'order_products.*.quantity' => 'required|min:1',
            'order_products.*.price' => 'required|min:1'
        ];
    }
}
