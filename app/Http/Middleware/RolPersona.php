<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolPersona
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->user()->rol);
        //SI EL USUARIO ES rol === 1 (persona). Lo llevamos al index de personas
        //$request->user()->rol es igual a auth()->user()->rol
        if ($request->user()->rol !== 1) {

            // return redirect()->route('home');
            return redirect()->back();
        }
        
        return $next($request);
    }
}
