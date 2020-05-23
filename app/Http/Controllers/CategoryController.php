<?php


namespace App\Http\Controllers;


use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /** @var CategoryRepository */
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getProductsForParentCategory(int $categoryId)
    {
        $this->categoryRepository->getProductsForParentCategory($categoryId);

        return view('');
    }
}
