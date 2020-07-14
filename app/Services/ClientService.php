<?php


namespace App\Services;


use App\Exceptions\DataAlreadyExists;
use App\Models\User;
use Exception;

class ClientService
{
    protected $repository;

    public function __construct()
    {

    }

    /**
     * @param array $data
     * @return int
     * @throws Exception
     */
    public function createOrUpdateClient(array $data)
    {
        //TODO
        $email = $data['email'];
        $user = User::where('email', $email)->first();

        if ($user) {
            throw new DataAlreadyExists(__('user.Already_created', [$email]));
        }

        return 0;
    }
}
