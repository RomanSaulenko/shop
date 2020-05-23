<?php

namespace App\Services;

use App\Models\Nomenclature;

class NomenclatureService
{
    /**@var Nomenclature */
    protected $nomenclature;

    public function __construct(Nomenclature $nomenclature)
    {
        $this->nomenclature = $nomenclature;
    }

    public function get($id)
    {
        return $this->nomenclature->find($id);
    }
}
