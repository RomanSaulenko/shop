<?php


namespace App\Http\Requests\Nomenclature;


use Illuminate\Foundation\Http\FormRequest;

class GetProductsForCategory extends FormRequest
{
    public function rules()
    {
        return [
            'filter.price_from' => 'numeric',
            'filter.price_to' => 'numeric'
        ];
    }


}
