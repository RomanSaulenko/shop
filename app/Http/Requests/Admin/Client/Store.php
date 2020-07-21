<?php


namespace App\Http\Requests\Admin\Client;


use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.phone' => 'required|phone:RU,AUTO',
            'user.email' => 'required|email',
        ];
    }
}
