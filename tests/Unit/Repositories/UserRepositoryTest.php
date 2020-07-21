<?php


namespace Tests\Unit\Repositories;


use App\Models\Order\Client;
use App\Models\User;
use App\Repositories\UserRepository;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    protected static $repository;

    /**
     * @covers \App\Repositories\UserRepository::getByEmail
     * @dataProvider getByEmailData
     */
    public function test_getByEmail_success($email, $clientId)
    {
        $repository = $this->getRepository();

        $result = $repository->getByEmail($email);
        $this->assertEquals(optional($result)->id, $clientId);
    }

    /**
     * @return UserRepository
     */
    protected function getRepository()
    {
        if (!static::$repository) {
            static::$repository = app(UserRepository::class);
        }
        return static::$repository;
    }

    public function getByEmailData()
    {
        $client = factory(User::class)->create();

        return [
            [$client->email, $client->id],
            ['invalid_email', null]
        ];
    }
}
