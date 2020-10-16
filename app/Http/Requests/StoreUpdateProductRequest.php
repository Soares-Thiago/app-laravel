<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => 'required|min:3|max:100',
            'description' => 'min:3|max:10000',
            'price' => 'required',
            'foto' => 'nullable|required|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'Nome precisa de 3 caracteres mínimos',
            'price.required' => 'Informe um preço',
            'foto.required' => 'Foto é obrigatório'
        ];
    }
}
