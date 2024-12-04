<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        if($request->user()->rol == 3) {

            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
            }
        } elseif($request->user()->rol == 1) {

            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::PERSONA.'?verified=1');
            }
        } elseif($request->user()->rol == 2) {

            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::MASCOTA.'?verified=1');
            }
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if($request->user()->rol == 3) {

            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');            

        } elseif($request->user()->rol == 1) {

            return redirect()->intended(RouteServiceProvider::PERSONA.'?verified=1');            

        } elseif($request->user()->rol == 2) {

            return redirect()->intended(RouteServiceProvider::MASCOTA.'?verified=1'); 
        }

        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
