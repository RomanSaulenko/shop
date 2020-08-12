<?php


namespace App\Services;


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
}
