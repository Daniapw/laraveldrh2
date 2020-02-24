<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ValidarEditUsuario extends FormRequest
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
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'before'=>'La fecha introducida debe ser anterior a la fecha actual.',
            'username.unique'=>'Ese nombre de usuario ya está en uso.',
            'username.max'=>'Máximo 30 caracteres',
            'alpha_num'=>'Este campo solo puede contener caracteres alfanuméricos.',
            'numeric'=>'Este campo solo puede contener números',
            'telefono.digits'=>'El número de teléfono debe tener 9 dígitos',
            'dimensions'=>'Las dimensiones máximas para la imagen de perfil son de 300x300 px'
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
            'username' => ['required', 'string', 'max:30', Rule::unique('users')->ignore(Auth::user()->id,"id"), 'alpha_num'],
            "fecha_nac"=>['required', 'before:today'],
            'codigo_postal'=>['nullable','alpha_num'],
            'telefono'=>['nullable','digits:9'],
            "pais"=>['required'],
            "imagen_perfil"=>['nullable','image', 'dimensions:max_width=300, max_height=300'],
            "sexo"=>['required']
        ];
    }
}
