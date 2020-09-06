<?php


namespace App\Http\Requests\Order;


use App\Adapters\Cart\CartItemToOrderProductAdapter;
use App\Modules\ShoppingBasket\Facades\Cart;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function prepareForValidation()
    {
        $user = $this->user();
        if ($user) {
//            $this->merge([
//                'user.id' => $user->id,
//                'user.name' => $user->name,
//                'user.phone' => $user->phone,
//                'user.email' => $user->email,
//            ]);
            $this->merge(['user' => $user->toArray()]);
        }

        $nomenclaturesFromCart = Cart::content()->toArray();
        $nomenclaturesToSave = collect();

        foreach ($nomenclaturesFromCart as $nomenclatureFromCart) {
            $nomenclaturesToSave[] = new CartItemToOrderProductAdapter($nomenclatureFromCart);
        }
        $this->merge([
            'order_products' => $nomenclaturesToSave->toArray()
        ]);
    }

    public function rules()
    {
        return [
            'user.id' => 'filled',
            'user.name' => 'required',
            'user.phone' => 'required|phone:RU,AUTO',
            'user.email' => 'required|email',
            'order_products.*.nomenclature_id' => 'required|exists:nomenclatures,id',
            'order_products.*.quantity' => 'required|min:1',
            'order_products.*.price' => 'required|min:1'
        ];
    }
}
