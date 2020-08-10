<?php

namespace App\Services;


use App\Events\Order\AfterOrderStore;
use App\Events\Order\BeforeOrderStore;
use App\Models\Order\Order;
use App\Repositories\Order\OrderRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class OrderService
{
    /**
     * @var OrderRepository
     */
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $orderId
     * @return Order
     */
    public function getOrder(int $orderId)
    {
        return $this->repository->getOrder($orderId);
    }

    /**
     * @param array $data
     * @return Order
     */
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $responses = event(new BeforeOrderStore($data));

            $order = new Order();

            foreach ($responses as $response) {
                $order->fill($response);
            }
            $order->save();

            $order->products()->createMany($data['order_products']);

            event(new AfterOrderStore($order));

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        return $order;
    }
}
