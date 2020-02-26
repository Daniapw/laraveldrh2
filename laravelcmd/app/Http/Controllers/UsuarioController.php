<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\ValidarEditUsuario;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Pagina de favoritos del usuario
     */
    public static function getFavoritos(){
        $libros=Auth::user()->books;

        return view("usuario.favoritos")
            ->with("libros", $libros);
    }

    /**
     * Perfil
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getPerfil(){
        return view("usuario.perfil");
    }

    /**
     * Modificar perfil
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getModificar(){
        return view("usuario.modificar_perfil");
    }


    /**
     * Poner libro en favoritos
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function postFavorito($id){
        $libro=Book::find($id);

        if (!Auth::user()->books->contains($libro->id)) {
            Auth::user()->books()->attach($libro);
            Auth::setUser(Auth::user()->fresh());
        }
    }

    /**
     * Quitar libro de favoritos
     * @param $id
     * @return mixed
     */
    public static function deleteFavorito($id){
        $libro=Book::find($id);

        if (Auth::user()->books->contains($libro->id)) {
            Auth::user()->books()->detach($libro);
            Auth::setUser(Auth::user()->fresh());
        }
    }

    /**
     * Borrar usuario
     * @param $id
     */
    public static function deleteUsuario(Request $request){
        $id=$request->input('id');

        try {
            $user = User::findOrFail($id);

            $user->reviews()->delete();
            $user->books()->detach();

            $user->delete();
        }
        catch(ModelNotFoundException $e){

        }

        return AdminController::getPanelUsuarios();
    }

    /**
     * Modificar usuario
     * @param ValidarEditUsuario $request
     */
    public static function putUsuario(ValidarEditUsuario $request){
        $datos=$request->validated();

        $imagen=Auth::user()->profile_img_file;
        $pais=Auth::user()->country;
        $codigo_postal=Auth::user()->postal_code;

        //Mover imagen al directorio assets/img/img_usuarios con nombre nuevo
        if (array_key_exists('imagen_perfil', $datos)) {
            $imagen=time()."".$datos['imagen_perfil']->getClientOriginalName();
            $datos['imagen_perfil']->move('assets/img/img_usuarios', $imagen);
        }

        //Cambiar codigo postal si se ha enviado
        if (array_key_exists('codigo_postal', $datos))
            $codigo_postal=$datos['codigo_postal'];


        //Cambiar pais si se ha enviado
        if (array_key_exists('pais', $datos))
            $pais=$datos['pais'];


        //Guardar
        Auth::user()->username=$datos['username'];
        Auth::user()->date_of_birth=$datos['fecha_nac'];
        Auth::user()->sex=$datos['sexo'];
        Auth::user()->country=$pais;
        Auth::user()->postal_code=$codigo_postal;
        Auth::user()->profile_img_file=$imagen;

        Auth::user()->save();

        return self::getPerfil();
    }

    /**
     * @param Request $request
     */
    public static function putRol(Request $request){

        try {
            $usuario = User::findOrFail($request->input('id'));

            $rol = $request->input('rol');

            $usuario->role = $rol;

            $usuario->save();
        }catch(ModelNotFoundException $e){

        }

        return AdminController::getPanelUsuarios();
    }
}
