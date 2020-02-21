<?php

namespace App\Http\Controllers;

use App\Review;
use App\Http\Controllers\LibrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{

    /**
     * Put review/opinion del usuario
     * @param Request $request
     * @param $id
     * @return string
     */
    public static function postReview(Request $request, $id){
        $contenido=$request->input('contenido');

        $review=Review::create([
            "book_id"=>$id,
            "content"=> $contenido,
            "score"=>5
        ]);

        Auth::user()->reviews->attach($review);

        return LibrosController::getInfo($id);
    }
}
