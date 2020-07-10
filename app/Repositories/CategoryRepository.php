<?php


namespace App\Repositories;


interface CategoryRepository
{
    public function getCategoriesByParentId(int $parentId);

}
