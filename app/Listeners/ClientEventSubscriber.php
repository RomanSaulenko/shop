<?php


namespace App\Listeners;


use App\Events\Order\BeforeOrderStore;
use App\Services\ClientService;

class ClientEventSubscriber
{
    /**
     * @var ClientService
     */
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Handle user login events.
     */
    public function handleBeforeCreateOrder(BeforeOrderStore $event)
    {
        $clientId = $this->clientService->createOrUpdateClient($event->getRequest()['client'] ?? []);

        return compact('clientId');
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
