<?php


namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;


class IndexPageController extends Controller
{
    /**@var CategoryRepository */
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getCategoriesByParentId(0);

        return view('client.index', compact('categories'));
    }
}
