<?php


namespace App\Repositories;


use App\Models\Category;

class CategoryRepository
{
    /** @var Category */
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getCategoriesByParentId($parentId)
    {
        return $this->model
            ->where('parent_id', $parentId)
            ->get();
    }

    public function getProductsForParentCategory(int $categoryId)
    {

    }
}
