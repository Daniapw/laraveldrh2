<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarEditLibro;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Vista del panel principal
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getPanelPrincipal(){
        return view('admin.panel');
    }

    /**
     * Vista del panel de usuarios
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getPanelUsuarios(){
        $usuarios=User::all();

        return view('admin.panel_usuarios.listado_usuarios')
            ->with("usuarios", $usuarios);
    }

    /**
     * Vista del panel de libros
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getPanelLibros(){
        $libros=Book::all();

        return view('admin.panel_libros.listado_libros')
            ->with("libros", $libros);
    }


    /**
     * Vista del formulario de creacion de libro
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getCrearLibro(){
        $categorias=Genre::all();

        return view('admin.panel_libros.crear_libro')
            ->with("generos", $categorias);
    }

    /**
     * Vista del formulario de creacion de libro
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getEditarLibro(Request $request){
        $categorias=Genre::all();

        try {
            $libro = Book::findOrFail($request->input('id'));
        }
        catch(ModelNotFoundException $e){
            return self::getPanelLibros();
        }

        return view('admin.panel_libros.editar_libro')
            ->with("generos", $categorias)
            ->with('libro', $libro);
    }

    /**
     * Vista del panel de categorias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getPanelCategorias(){
        $generos=Genre::all();

        return view('admin.panel_categorias.listado_categorias')
            ->with("generos", $generos);
    }

    /**
     * Vista del formulario de creacion de categoria
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getCrearCategoria(){

        return view('admin.panel_categorias.crear_categoria');
    }

    /**
     * Vista del formulario de creacion de libro
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function getEditarCategoria(Request $request){

        try {
            $genero = Genre::findOrFail($request->input('id'));
        }
        catch(ModelNotFoundException $e){
            return self::getPanelCategorias();
        }

        return view('admin.panel_categorias.editar_categoria')
            ->with('genero', $genero);
    }
}
