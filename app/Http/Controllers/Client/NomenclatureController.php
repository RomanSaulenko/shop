<?php


namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Http\Requests\Nomenclature\GetProductsForCategory;
use App\Repositories\NomenclatureRepository;
use App\Services\NomenclatureService;

class NomenclatureController extends Controller
{
    /**
     * @var NomenclatureService
     */
    protected $nomenclatureService;

    /**
     * @var NomenclatureRepository
     */
    protected $repository;

    public function __construct(NomenclatureService $nomenclatureService, NomenclatureRepository $repository)
    {
        $this->nomenclatureService = $nomenclatureService;
        $this->repository = $repository;
    }

    public function getProductContent(string $id)
    {
        $nomenclature = $this->nomenclatureService->getProduct($id);

        return view('nomenclature.cart');
    }

    public function getProductsForCategory(GetProductsForCategory $request, int $categoryId)
    {
        $products = $this->nomenclatureService
            ->getProductsForCategory($categoryId, $request->validated()['filter'] ?? [])
            ->paginate(8)
        ;
        $requestData = $request->validated();

        return view('client.category.list-products', compact('products', 'requestData'));
    }

    public function getProductById(string $productId)
    {
        $product = $this->repository->getProduct($productId);

        return view('client.nomenclature.cart', compact('product'));
    }


}
