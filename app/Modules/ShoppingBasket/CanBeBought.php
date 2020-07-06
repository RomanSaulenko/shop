<?php

namespace App\Modules\ShoppingBasket;

trait CanBeBought
{

    /**
     * Get the identifier of the Buyable item.
     *
     * @return int|string
     */
    public function getBuyableIdentifier($options = null)
    {
        return method_exists($this, 'getKey') ? $this->getKey() : $this->id;
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @return string
     */
    public function getBuyableDescription($options = null)
    {
        if($name = $this->name) return $name;
        if($title = $this->title) return $title;
        if($description = $this->description) return $description;

        return null;
    }

    /**
     * Get the price of the Buyable item.
     *
     * @return float
     */
    public function getBuyablePrice($options = null)
    {
        if($price = $this->price) return $price;

        return null;
    }
}
