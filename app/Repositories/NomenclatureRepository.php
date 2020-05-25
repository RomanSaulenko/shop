<?php


namespace App\Repositories;


interface NomenclatureRepository
{
    public function getByCategory(int $categoryId);

    public function getProduct(int $id);
}
