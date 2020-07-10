<?php


namespace App\Repositories\Order;


use App\Models\Order\Order;

interface OrderRepository
{
    /**
     * @param int $orderId
     * @return Order
     */
    public function getOrder(int $orderId);

    /**
     * @param array $data
     * @return Order
     */
    public function store(array $data);
}
