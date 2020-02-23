<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarEditCategoria extends FormRequest
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
        //Esta es la id de la categoria que se ignorara al comprobar si el nombre es unico en la base de datos
        $id = $this->get("id");

        return [
            'name'=>[Rule::unique('genres')->ignore($id,"id"), 'max:30', 'required'],
            "icono"=>'nullable|max:30'
        ];

    }
}
