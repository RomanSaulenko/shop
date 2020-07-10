<?php


namespace App\Listeners;


use App\Events\Order\BeforeOrderStore;
use App\Services\DeliveryService;

class DeliveryEventSubscriber
{
    /**
     * @var DeliveryService
     */
    protected $deliveryService;

    public function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    /**
     * Handle user login events.
     */
    public function handleBeforeCreateOrder(BeforeOrderStore $event)
    {
        $deliveryId = $this->deliveryService->createDelivery($event->getRequest()['delivery'] ?? []);

        return ['delivery_id' => $deliveryId];
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            BeforeOrderStore::class,
            __CLASS__ . '@handleBeforeCreateOrder'
        );
    }
}
