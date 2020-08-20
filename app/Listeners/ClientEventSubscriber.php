<?php


namespace App\Listeners;


use App\Events\Client\ClientRegistered;
use App\Events\Order\BeforeOrderStore;
use App\Models\Group;
use App\Models\User;
use App\Services\ClientService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Silber\Bouncer\BouncerFacade;

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
        $userData = $event->getRequest()['user'] ?? [];

        if ($user = Auth::user()) {
            $this->userService->update($user->id, $userData);
        } else {
            $user = $this->userService->create($userData);
        }
        $this->addClientGroupToUser($user);

        $client = $this->clientService->create(['user_id' => $user->id]);

        return ['client_id' => $client->id];
    }

    public function handleAfterClientRegistered(ClientRegistered $event)
    {
        $this->addClientGroupToUser($event->getUser());
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
        $events->listen(
            ClientRegistered::class,
            __CLASS__ . '@handleAfterClientRegistered'
        );
    }

    protected function addClientGroupToUser(User $user)
    {
        return $this->clientService->addClientGroupToUser($user);
    }
}
