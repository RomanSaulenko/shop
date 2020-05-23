<?php


namespace App\Http\Controllers;


use App\Repositories\NomenclatureRepository;
use App\Services\NomenclatureService;
use Illuminate\Http\Request;

class NomenclatureController extends Controller
{
    /**
     * @var NomenclatureService
     */
    protected $nomenclatureService;
    /**
     * @var NomenclatureRepository
     */
    protected $nomenclatureRepository;

    public function __construct(NomenclatureService $nomenclatureService, NomenclatureRepository $nomenclatureRepository)
    {
        $this->nomenclatureService = $nomenclatureService;
        $this->nomenclatureRepository = $nomenclatureRepository;
    }

    public function cart($id)
    {
        $nomenclature = $this->nomenclatureService->get($id);

        return view();
    }

    public function list(Request $request)
    {

    }
}
