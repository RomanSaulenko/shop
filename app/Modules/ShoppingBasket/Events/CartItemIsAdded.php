<?php


namespace App\Modules\ShoppingBasket\Events;


use App\Modules\ShoppingBasket\CartItem;

class CartItemIsAdded
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
