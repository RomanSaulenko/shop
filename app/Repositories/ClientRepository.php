<?php


namespace App\Repositories;


use App\Dto\Admin\Client\ListIndexDto;
use App\Models\Order\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

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
     * @param ListIndexDto $dto
     * @return Builder
     */
    public function get(ListIndexDto $dto): Builder
    {
        $model = $this->model::query();
        $model->with('user');

        if ($name = $dto->getClientName()) {
            $userIds = $model->user()
                ->where('name', 'like', "%{$name}%")
                ->get('id');

            $model->whereIn('user_id', $userIds);
        }
        return $model;
    }

    /**
     * @param array $data
     * @return Client
     */
    public function updateOrCreate(array $data)
    {
        $model = $this->model->updateOrCreate($data);
        $model->save();

        return $model;
    }

}
