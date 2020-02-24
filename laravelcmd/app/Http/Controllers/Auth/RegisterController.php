<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $mensajes = [
            'required' => 'Este campo es obligatorio.',
            'before'=>'La fecha introducida debe ser anterior a la fecha actual.',
            'username.unique'=>'Ese nombre de usuario ya está en uso.',
            'username.max'=>'Máximo 30 caracteres',
            'email.unique'=>'Esa dirección de correo electrónico ya ha sido registrada.',
            'alpha_num'=>'Este campo solo puede contener caracteres alfanuméricos.',
            'numeric'=>'Este campo solo puede contener números',
            'telefono.digits'=>'El número de teléfono debe tener 9 dígitos',
            'dimensions'=>'Las dimensiones máximas para la imagen de perfil son de 300x300 px'
        ];


        return Validator::make($data, [
            'username' => ['required', 'string', 'max:30', 'unique:users', 'alpha_num'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            "fecha_nac"=>['required', 'before:today'],
            'codigo_postal'=>['nullable','alpha_num'],
            'telefono'=>['nullable','digits:9'],
            "pais"=>['required'],
            "imagen_perfil"=>['nullable','image', 'dimensions:max_width=300, max_height=300']
        ], $mensajes);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $imagen="default_user.jpg";

        //Mover imagen al directorio assets/img/img_usuarios con nombre nuevo
        if (array_key_exists('imagen_perfil', $data)) {
            $imagen=time()."".$data['imagen_perfil']->getClientOriginalName();
            $data['imagen_perfil']->move('assets/img/img_usuarios', $imagen);
        }

        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'sex'=>$data['sexo'],
            'date_of_birth'=>$data['fecha_nac'],
            'country'=>$data['pais'],
            'postal_code'=>$data['codigo_postal'],
            'phone_number'=>$data['telefono'],
            'profile_img_file'=>$imagen
        ]);
    }
}
