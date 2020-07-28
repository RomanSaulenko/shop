<?php


namespace App\Services;


use App\Exceptions\DataAlreadyExists;
use App\Repositories\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @throws DataAlreadyExists
     */
    public function create(array $data)
    {
        $email = $data['email'];
        $user = $this->repository
            ->getByEmail($email)
            ->first();

        if ($user) {
            throw new DataAlreadyExists(__('user.Already_created', ['attribute' => $email]));
        }
        return $this->repository->create($data);
    }

    public function update(array $data)
    {

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
            ->getUser($id);
    }
}
