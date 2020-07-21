<?php


namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;


class IndexPageController extends Controller
{
    /**@var CategoryRepository */
    protected $repository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->repository->getCategoriesByParentId(0);

        return view('client.index', compact('categories'));
    }
}
