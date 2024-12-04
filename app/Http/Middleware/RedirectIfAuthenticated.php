<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            //Arreglar la redireccion segun el rol de usuario
            if (Auth::guard($guard)->check()) {

                if($request->user()->rol == 1) {

                    return redirect(RouteServiceProvider::PERSONA);

                } elseif($request->user()->rol == 2) {
                    
                    return redirect(RouteServiceProvider::MASCOTA);

                } elseif($request->user()->rol == 3) {
                    
                    return redirect(RouteServiceProvider::HOME);

                }
            }
        }

        return $next($request);
    }
}
