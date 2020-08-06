<?php


namespace App\Repositories;


use App\Models\Order\Client;

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

}
