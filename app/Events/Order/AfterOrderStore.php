<?php


namespace App\Events\Order;


use App\Models\Order\Order;

class AfterOrderStore
{
    /**
     * @var Order
     */
    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function getOrder()
    {
        return $this->order;
    }
}
