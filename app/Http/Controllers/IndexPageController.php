<?php


namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryMysql;


class IndexPageController extends Controller
{
    /**@var CategoryRepositoryMysql */
    protected $categoryRepository;

    public function __construct(CategoryRepositoryMysql $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getCategoriesByParentId(0);

        return view('client.index', compact('categories'));
    }
}
