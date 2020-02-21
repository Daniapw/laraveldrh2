<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Peticiones POST
     * @param Request $request
     * @param $id
     */
    public static function post(Request $request, $id){
        if ($request->has('btn_post_fav'))
            UsuarioController::postFavorito($id);
        elseif($request->has('btn_post_review'))
            ReviewsController::postReview($request, $id);

        return LibrosController::getInfo($id);
    }

    /**
     * Peticiones PUT
     * @param Request $request
     * @param $id
     */
    public static function put(Request $request, $id){
        if ($request->has('btn_put_review'))
            ReviewsController::putReview($request, $id);

        return LibrosController::getInfo($id);
    }

    /**
     * Peticiones DELETE
     * @param Request $request
     * @param $id
     */
    public static function delete(Request $request, $id){
        if ($request->has('btn_delete_fav'))
            UsuarioController::deleteFavorito($id);
        elseif($request->has('btn_delete_review'))
            ReviewsController::deleteReview($id);

        return LibrosController::getInfo($id);
    }
}
