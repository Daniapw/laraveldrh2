<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarLibro extends FormRequest
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

    public function messages()
    {
        return [
            "required"=>"Este campo es obligatorio",
            "fecha_pub.before"=>"La fecha de publicación debe ser anterior a la fecha actual",
            "imagen_caratula.dimensions"=>"La carátula debe tener unas dimensiones máximas de 500x750 px",
            "autor.alpha"=>"El nombre del autor solo puede contener caracteres alfabéticos",
            "autor.max"=>"El nombre del autor solo puede contener hasta 255 caracteres",
            "title.required"=>"Debe introducir el título del libro",
            "title.unique"=>"Ese título ya ha sido registrado en la base de datos",
            "title.max"=>"El título del libro solo puede contener hasta 255 caracteres",
            "title.alpha_num"=>"El título del libro solo puede contener caracteres alfanuméricos",
            "sinopsis.max"=>"La sinopsis solo puede contener hasta 700 caracteres",
            "info.max"=>"La información adicional solo puede hasta 500 caracteres",

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
            'imagen_caratula'=>'nullable|image|dimensions:max_width=500, max_height=750',
            'title'=>'required|unique:books|max:255',
            'autor'=>'required|max:255',
            'categoria'=>'required',
            'fecha_pub'=>'required|before:today',
            'sinopsis'=>'required|max:700',
            'info'=>'required|max:500'
        ];
    }
}
