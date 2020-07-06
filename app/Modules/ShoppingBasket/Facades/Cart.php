<?php
namespace App\Modules\ShoppingBasket\Facades;

use App\Modules\ShoppingBasket\CartItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static CartItem add($id, $name = null, $qty = null, $price = null, array $options = [])
 * @method static Collection content()
 */
class Cart extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'shopping_basket';
    }
}
