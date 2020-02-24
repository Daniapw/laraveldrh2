<?php

namespace App\Http\Controllers;

use App\Review;
use App\Http\Controllers\LibrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{

    /**
     * Agregar review/opinion del usuario
     * @param Request $request
     * @param $id
     * @return string
     */
    public static function postReview(Request $request, $id){
        $content=$request->input('content');

        //Validar contenido
        $request->validate([
            'content' => 'required|max:280',
        ], ["required"=>"No puedes mandar una opinión en blanco", "max"=>"La longitud máxima es de 280 caracteres"]);

        //Comprobar si el usuario ya ha escrito una review del libro y guardarla si no lo ha hecho
        if (Auth::user()->reviews()->where("book_id", "=", $id)->first()==null){
            $review=Review::create([
                "user_id"=>Auth::user()->id,
                "book_id"=>$id,
                "content"=> $content
            ]);

            $review->save();
        }

    }

    /**
     * Editar review
     * @param $request
     * @param $id
     */
    public static function putReview($request, $id){
        $review=Auth::user()->reviews()->where("book_id", "=", $id)->first();

        //Validar contenido
        $request->validate([
            'content_editar' => 'required|max:280',
        ], ["required"=>"No puedes mandar una opinión en blanco", "max"=>"La longitud máxima es de 280 caracteres"]);


        $review->content=$request->input('content_editar');

        $review->save();
    }

    /**
     * Borrar review
     * @param $id
     */
    public static function deleteReview($id){
        $review=Auth::user()->reviews()->where("book_id", "=", $id)->first();

        if ($review!=null)
            $review->delete();
    }
}
