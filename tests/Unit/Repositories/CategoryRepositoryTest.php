<?php


namespace Tests\Unit\Repositories;


use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    protected static $repository;

    /**
     * @covers CategoryRepository::getCategoriesByParentId
     */
    public function test_getCategoriesByParentId()
    {
        $repository = $this->getRepository();
        $result = $repository->getCategoriesByParentId(0);

        $this->assertInstanceOf(Collection::class, $result);
    }

    /**
     * @return CategoryRepository
     */
    protected function getRepository()
    {
        if (!static::$repository) {
            static::$repository = app(CategoryRepository::class);
        }
        return static::$repository;
    }
}
