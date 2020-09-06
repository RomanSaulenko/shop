<?php


namespace App\Http\Requests\Admin\Client;


use App\Dto\Admin\Client\ListIndexDto;
use Illuminate\Foundation\Http\FormRequest;

class ListIndex extends FormRequest
{
    public function rules(): array
    {
        return [
            'client_name' => 'filled'
        ];
    }

    public function getDto(): ListIndexDto
    {
        return new ListIndexDto($this->get('client_name'));
    }
}
