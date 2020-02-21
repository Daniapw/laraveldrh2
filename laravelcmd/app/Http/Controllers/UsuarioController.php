<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
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

}
