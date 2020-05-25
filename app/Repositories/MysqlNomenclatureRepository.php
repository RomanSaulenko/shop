<?php


namespace App\Repositories;


use App\Models\Nomenclature;
use Illuminate\Database\Eloquent\Builder;

class MysqlNomenclatureRepository implements NomenclatureRepository
{
    /**
     * @var Nomenclature
     */
    protected $nomenclature;

    public function __construct(Nomenclature $nomenclature)
    {
        $this->nomenclature = $nomenclature;
    }

    /**
     * @param int $categoryId
     * @return Builder
     */
    public function getByCategory(int $categoryId)
    {
        return $this->nomenclature
            ->where('category_id', $categoryId);
    }

    public function getProduct(int $id)
    {
        return $this->nomenclature->first($id);
    }


}
