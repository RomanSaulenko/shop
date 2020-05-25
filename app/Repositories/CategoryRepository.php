<?php


namespace App\Repositories;


interface CategoryRepository
{
    public function getCategoriesByParentId(int $parentId);

    public function getProductsForCategory(int $parentId);
}
