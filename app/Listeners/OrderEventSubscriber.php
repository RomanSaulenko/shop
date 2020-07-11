<?php


namespace App\Listeners;


use App\Events\Order\AfterOrderStore;
use App\Models\Order\Client;
use App\Notifications\OrderCreated;

class OrderEventSubscriber
{
    public function handleAfterCreateOrder(AfterOrderStore $event)
    {
        $order = $event->getOrder();
        app(Client::class)->notify(new OrderCreated($order));
//        $order->client->notify(new OrderCreated($order));
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
