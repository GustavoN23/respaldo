<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::has('notifications')->first();
        // dd($user->unreadNotifications);

        if ($user) {
            $notificaciones = $user->unreadNotifications()->get();
            
            //Limpiar notificaciones
            $user->unreadNotifications()->get()->markAsRead();
    
            $historialNotificaciones = $user->readNotifications()->get();
    
            return view('notificaciones.index', [
                'notificaciones' => $notificaciones,
                'historialNotificaciones' => $historialNotificaciones
            ]);

        } else {

            //Manejar el caso en que no haya usuarios con notificaciones
            return view('notificaciones.index', [
                'notificaciones' => [],
                'historialNotificaciones' => []
            ]);
        }
    }
}
