<?php


namespace App\Services;


use App\Exceptions\DataAlreadyExists;
use App\Repositories\ClientRepository;

class ClientService
{
    protected $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return int
     * @throws DataAlreadyExists
     */
    public function createOrUpdateClient(array $data)
    {
        //TODO
        $email = $data['email'];
        $user = $this->repository->getByEmail($email)->first();

        if ($user) {
            throw new DataAlreadyExists(__('user.Already_created', [$email]));
        }

        return 0;
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function getClients()
    {
        return $this->repository
            ->getClients();
    }

    public function getClient($id)
    {
        return $this->repository
            ->getClient($id);
    }
}
