<?php


namespace App\Http\Controllers;


use App\Repositories\CategoryRepositoryMysql;

class CategoryController extends Controller
{
    /** @var CategoryRepositoryMysql */
    protected $categoryRepository;

    public function __construct(CategoryRepositoryMysql $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

}

