<?php


namespace App\Repositories;


use App\Models\Category;

class CategoryRepositoryMysql implements CategoryRepository
{
    /** @var Category */
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * @param int $parentId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCategoriesByParentId($parentId)
    {
        return $this->model
            ->where('parent_id', $parentId)
            ->get();
    }

}
