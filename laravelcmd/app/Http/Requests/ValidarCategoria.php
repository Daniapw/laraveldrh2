<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarCategoria extends FormRequest
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
     * Mensajes
     * @return array
     */
    public function messages()
    {
        return [
            "required"=>"Este campo es obligatorio",
            "unique"=>"Ya existe una categoría con ese nombre",
            "max"=>"Máximo 30 caracteres"
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:30|unique:genres',
            "icono"=>'nullable|max:30'
        ];
    }
}
