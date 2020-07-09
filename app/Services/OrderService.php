<?php


namespace App\Services;


use App\Events\Order\AfterOrderStore;
use App\Events\Order\BeforeOrderStore;
use App\Models\Order\Order;
use App\Repositories\Order\OrderRepository;
use Illuminate\Support\Facades\DB;

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

    public function store($data)
    {
        $order = DB::transaction(function() use ($data) {
            $order = new Order();

            $responses = event(new BeforeOrderStore($data));

            foreach ($responses as $response) {
                $order->fill($response);
            }

            $order->phone = $data['client']['phone'];
            $order->email = $data['client']['email'];

            $order->save();

            event(new AfterOrderStore($order));

            return $order;
        });


        return $order;
    }
}
