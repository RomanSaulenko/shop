<?php

namespace App\Services;

use App\Repositories\NomenclatureRepository;

class NomenclatureService
{
    /**@var NomenclatureRepository */
    protected $nomenclatureRepository;

    public function __construct(NomenclatureRepository $nomenclatureRepository)
    {
        $this->nomenclatureRepository = $nomenclatureRepository;
    }

    public function getProduct($id)
    {
        return $this->nomenclatureRepository->getProduct($id);
    }

    public function getProductsForCategory(int $categoryId, $filters = [])
    {
        return $this->nomenclatureRepository->getByCategory($categoryId, $filters);
    }
}
