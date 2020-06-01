<?php


namespace App\Repositories;


interface NomenclatureRepository
{
    public function getByCategory(int $categoryId, array $filters = []);

    public function getProduct(int $id);
}
