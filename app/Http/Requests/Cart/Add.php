<?php


namespace App\Http\Requests\Cart;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class Add extends FormRequest
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

        if (array_key_exists('options', $data)) {
            $options = json_decode($data['options'], true);
            $this->query->set('options', $options);
        }
    }
}
