<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevaInscripcion extends Notification
{
    use Queueable;

    public $id_campana;
    public $nombre_campana;
    public $usuario_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_campana, $nombre_campana, $usuario_id)
    {
        $this->id_campana = $id_campana;
        $this->nombre_campana = $nombre_campana;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Te has inscrito a la jornada de vacunacion: ' . $this->nombre_campana)
                    ->line('Llega temprano y no olvides el documento de identidad')
                    ->line('TE ESPERAMOS ' . auth()->user()->name . ' ' . auth()->user()->apellido)
                    ->line('Un saludo, desde el equipo de UrVaccine');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
