<?php


namespace Tests\Unit\Repositories;


use App\Repositories\NomenclatureRepository;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class NomenclatureRepositoryTest extends TestCase
{
    protected static $repository;

    /**
     * @see NomenclatureRepository::getByCategory()
     */
    public function test_getByCategory()
    {
        $repository = $this->getRepository();

        $categoryId = rand(0, 100);
        $filters = [
            'price_from' => '1000',
            'price_to' => '2000',
        ];
        $result = $repository->getByCategory($categoryId, $filters)->get();

        $this->assertInstanceOf(Collection::class, $result);
    }

    /**
     * @return NomenclatureRepository
     */
    protected function getRepository()
    {
        if (!static::$repository) {
            static::$repository = app(NomenclatureRepository::class);
        }
        return static::$repository;
    }
}
