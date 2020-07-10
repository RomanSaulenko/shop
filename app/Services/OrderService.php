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

    public function getOrder(int $orderId)
    {
        return $this->repository->getOrder($orderId);
    }

    /**
     * @param $data
     * @return Order
     * @throws Exception
     */
    public function store($data)
    {

        try {
            $responses = event(new BeforeOrderStore($data));

            DB::beginTransaction();

            $order = new Order();

            foreach ($responses as $response) {
                $order->fill($response);
            }
            $order->phone = $data['client']['phone'];
            $order->email = $data['client']['email'];
            $order->save();

            $order->products()->createMany($data['order_products']);

            DB::commit();

            event(new AfterOrderStore($order));

        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }


        return $order;
    }
}
