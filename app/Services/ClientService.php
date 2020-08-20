<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\ClientRepository;

class ClientService
{
    /**
     * @var ClientRepository
     */
    protected $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(array $filters = [])
    {
        return $this->repository->all($filters);
    }

    public function addClientGroupToUser(User $user)
    {
        return $this->repository->addClientGroupToUser($user);
    }
}
