<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    /**
     * @var User
     */
    protected $model;

    public function __construct(User $client)
    {
        $this->model = $client;
    }

    public function create(array $data)
    {
        $model = $this->model->newInstance($data);
        $model->save();

        return $model;
    }

    public function getUsers()
    {
        return $this->model;
    }

    public function getByEmail(string $email)
    {
        return $this->model
            ->where('email', $email)
            ->first();
    }

    public function getUser($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }
}
