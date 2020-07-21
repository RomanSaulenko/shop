<?php


namespace App\Listeners;


use App\Events\Order\BeforeOrderStore;
use App\Services\UserService;

class ClientEventSubscriber
{
    /**
     * @var UserService
     */
    protected $service;

    public function __construct(UserService $clientService)
    {
        $this->service = $clientService;
    }

    /**
     * Handle user login events.
     * @throws \Exception
     */
    public function handleBeforeCreateOrder(BeforeOrderStore $event)
    {
        $clientId = $this->service->createOrUpdate($event->getRequest()['user'] ?? []);

        return ['client_id' => $clientId];
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
