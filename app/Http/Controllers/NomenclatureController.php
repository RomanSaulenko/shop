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

    public function __construct(NomenclatureService $nomenclatureService)
    {
        $this->nomenclatureService = $nomenclatureService;
    }

    public function getProductContent(string $id)
    {
        $nomenclature = $this->nomenclatureService->getProduct($id);

        return view('nomenclature.cart');
    }

    public function getProductsForCategory(Request $request, int $categoryId)
    {
        $products = $this->nomenclatureService
            ->getProductsForCategory($categoryId)
            ->paginate(1)
        ;

        return view('client.category.list-products', compact('products'));
    }


}
