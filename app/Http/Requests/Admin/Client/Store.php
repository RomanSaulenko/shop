<?php


namespace App\Http\Requests\Admin\Client;


use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function rules()
    {
        return [
            'client.name' => 'required',
            'client.phone' => 'required|phone:RU,AUTO',
            'client.email' => 'required|email',
        ];
    }
}
