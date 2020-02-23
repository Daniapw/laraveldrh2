<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * ESTE ES EL MIDDLEWARE PERSONALIZADO
 * Class MiMiddleware
 * @package App\Http\Middleware
 */

class MiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() && Auth::user()->role=="admin")
            return $next($request);


        return redirect("/");
    }
}
