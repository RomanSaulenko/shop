<?php


namespace App\Services;


use App\Exceptions\DataAlreadyExists;
use App\Repositories\UserRepository;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return int
     * @throws DataAlreadyExists
     */
    public function createOrUpdate(array $data)
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

    public function getUsers()
    {
        return $this->repository
            ->getUsers();
    }

    public function getUser($id)
    {
        return $this->repository
            ->getClient($id);
    }
}
