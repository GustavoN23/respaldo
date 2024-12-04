<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if($request->user()->rol == 3) {
    
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::HOME);
            }

        } elseif($request->user()->rol == 1) {
    
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::PERSONA);
            }

        } elseif($request->user()->rol == 2) {
    
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::MASCOTA);
            }
        } 

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
