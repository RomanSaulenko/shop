<?php


namespace App\Listeners;


use App\Events\Order\BeforeOrderStore;
use App\Services\ClientService;
use App\Services\UserService;

class ClientEventSubscriber
{
    /**
     * @var ClientService
     */
    protected $clientService;
    /**
     * @var UserService
     */
    protected $userService;

    public function __construct(ClientService $clientService, UserService $userService)
    {
        $this->clientService = $clientService;
        $this->userService = $userService;
    }

    /**
     * Handle user login events.
     * @throws \Exception
     */
    public function handleBeforeCreateOrder(BeforeOrderStore $event)
    {
        $user = $this->userService->create($event->getRequest()['user'] ?? []);
        $client = $this->clientService->create(['user_id' => $user->id]);

        return ['client_id' => $client->id];
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
