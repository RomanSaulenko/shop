<?php


namespace App\Http\Requests\Basket;


use Illuminate\Foundation\Http\FormRequest;

class AddItem extends FormRequest
{
    public function rules()
    {
        return [
            'productId' => 'required|numeric',
            'options.model' => 'required'
        ];
    }

    public function prepareForValidation()
    {
        $data = $this->validationData();

        $options = json_decode($data['options'], true);
        $this->merge(['options' => $options]);
    }
}
