<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddAuthHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    { 
        $request["prueba"] = 0;

        if(!$request->bearerToken()){
            
            //$request["prueba"] = 1;

            if($request->hasCookie('_token')){
                //$request["prueba"] = 10;
                $token = $request->cookie("_token");
                $request->headers->add(["Authorization" => "Bearer " . $token]);
            }
        }
        return $next($request);
    }
}
