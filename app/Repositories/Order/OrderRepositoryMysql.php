<?php


namespace App\Repositories\Order;


use App\Models\Order\Order;

class OrderRepositoryMysql implements OrderRepository
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function getOrder(int $orderId)
    {
        return $this->model->find($orderId);
    }


    public function store(array $data)
    {

    }
}
