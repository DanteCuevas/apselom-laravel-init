<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name'      => ['required', 'string', 'max:20', 'unique:products'],
            'stock'     => ['required', 'integer', 'min:10'],
            'code'      => ['required', 'string', 'max:6'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'El campo nombre es requerido',
            'name.string'       => 'El campo nombre debe ser un texto',
            'name.max'          => 'El campo nombre debe ser maximo de longitud 5',
            'name.unique'       => 'El campo nombre ya existe',

            'stock.required'    => 'El campo stock es requerido',
            'stock.integer'     => 'El campo stock debe ser un numero',
            'stock.min'         => 'El campo stock debe ser minimo 10',
        ];
    }
}
