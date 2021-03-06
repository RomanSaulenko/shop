<?php


namespace App\Modules\ShoppingBasket\Events;


use App\Modules\ShoppingBasket\CartItem;

class CartItemIsUpdated
{
    protected $cartItem;

    public function __construct(CartItem $cartItem)
    {
        $this->cartItem = $cartItem;
    }

    public function getCartItem()
    {
        return $this->cartItem;
    }
}
