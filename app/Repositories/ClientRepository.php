<?php


namespace App\Repositories;

use App\Models\Group;
use App\Models\Order\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Silber\Bouncer\BouncerFacade;

class ClientRepository
{
    /**
     * @var Client
     */
    protected $model;

    public function __construct(Client $client)
    {
        $this->model = $client;
    }

    /**
     * @param array $data
     * @return Client
     */
    public function create(array $data)
    {
        $model = $this->model->firstOrNew($data);
        $model->save();

        return $model;
    }

    /**
     * @param array $filters
     * @return Collection
     */
    public function all(array $filters = [])
    {
        return $this->model
            ->with(['user'])
            ->get();
    }

    public function addClientGroupToUser(User $user)
    {
        BouncerFacade::assign(Group::CLIENT)->to($user);

        return true;
    }
}
