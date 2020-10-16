<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(2);//recuperando o id pela url, o segmento 2

        return [
            'name' => 'required|min:3|max:255|'.Rule::unique('products')->ignore($id).'',
            'description' => 'min:3|max:10000',
            'price' => 'required|between:0,99.99',
            'foto' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'Nome precisa de 3 caracteres mínimos',
            'price.required' => 'Informe um preço'
           
        ];
    }
}
