<?php


namespace App\Listeners;


use App\Events\Order\AfterOrderStore;

class OrderEventSubscriber
{
    public function handleAfterCreateOrder(AfterOrderStore $event)
    {
        $order = $event->getOrder();
        $order->client->notify();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            AfterOrderStore::class,
            __CLASS__ . '@handleAfterCreateOrder'
        );
    }
}
