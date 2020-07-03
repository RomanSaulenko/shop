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
    public function getByCategory(int $categoryId, array $filters = [])
    {
        $query = $this->nomenclature
            ->where('category_id', $categoryId);

        if (array_key_exists('price_from', $filters) && $filters['price_from']) {
            $query->where('price_retail', '>=',  $filters['price_from']);
        }

        if (array_key_exists('price_to', $filters) && $filters['price_to']) {
            $query->where('price_retail', '<=', $filters['price_to']);
        }
        $query->with(['category', 'brand']);

        return $query;
    }

    public function getProduct(int $id)
    {
        return $this->nomenclature->findOrFail($id);
    }


}
