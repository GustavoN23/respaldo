<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        //Obtenemos el usuario ya autenticado en el sistema
        $user = Auth::user();

        //Con el usuario ya autenticado, redireccionamos segun su rol
        if ($user->rol == 1) {

            return redirect()->route('personas.index');

        } elseif ($user->rol == 3) {

            return redirect()->route('campanas.index');

        } elseif ($user->rol == 2) {

            return redirect()->route('mascotas.index');
            //return redirect()->intended(RouteServiceProvider::MASCOTA);

        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
