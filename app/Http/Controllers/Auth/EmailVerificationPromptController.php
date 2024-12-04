<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        if($request->user()->rol == 3) {

            return $request->user()->hasVerifiedEmail()
                        ? redirect()->intended(RouteServiceProvider::HOME)
                        : view('auth.verify-email');

        } elseif($request->user()->rol == 1) {

            return $request->user()->hasVerifiedEmail()
                        ? redirect()->intended(RouteServiceProvider::PERSONA)
                        : view('auth.verify-email');

        } elseif($request->user()->rol == 2) {

            return $request->user()->hasVerifiedEmail()
                        ? redirect()->intended(RouteServiceProvider::MASCOTA)
                        : view('auth.verify-email');
        }

        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('auth.verify-email');
    }
}
