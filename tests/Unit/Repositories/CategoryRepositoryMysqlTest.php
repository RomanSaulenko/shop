<?php


namespace Tests\Unit\Repositories;


use App\Repositories\CategoryRepositoryMysql;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class CategoryRepositoryMysqlTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @see CategoryRepositoryMysql::getCategoriesByParentId()
     */
    public function testGetCategoriesByParentId()
    {
        
    }
}
