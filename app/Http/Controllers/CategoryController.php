<?php


namespace App\Http\Controllers;


use App\Repositories\MysqlCategoryRepository;

class CategoryController extends Controller
{
    /** @var MysqlCategoryRepository */
    protected $categoryRepository;

    public function __construct(MysqlCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

}

