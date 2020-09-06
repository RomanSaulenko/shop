<?php


namespace App\Services;


use App\Dto\Admin\Client\ListIndexDto;
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

    /**
     * @param ListIndexDto $dto
     * @return \App\Models\Order\Client
     */
    public function get(ListIndexDto $dto)
    {
        return $this->repository->get($dto);
    }

    public function updateOrCreate(array $data)
    {
        return $this->repository->updateOrCreate($data);
    }
}
