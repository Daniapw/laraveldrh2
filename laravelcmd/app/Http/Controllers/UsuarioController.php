<?php

namespace App\Http\Controllers;

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
}
