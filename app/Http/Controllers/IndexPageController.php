<?php


namespace App\Http\Controllers;

use App\Repositories\MysqlCategoryRepository;


class IndexPageController extends Controller
{
    /**@var MysqlCategoryRepository */
    protected $categoryRepository;

    public function __construct(MysqlCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getCategoriesByParentId(0);

        return view('client.index', compact('categories'));
    }
}
