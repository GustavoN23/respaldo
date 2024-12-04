<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoInscrito extends Notification
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
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notificaciones');

        return (new MailMessage)
                    ->line('Tienes un nuevo inscrito a jornadas de vacunacion')
                    ->line('Jornada: ' . $this->nombre_campana)
                    ->action('Ver notificaciones', $url)
                    ->line('Un saludo, desde el equipo de UrVaccine!');
    }

    //Almacena las notificaciones en la BD (en la columna data de la tabla notifications)
    public function toDatabase($notifiable) 
    {
        return [
            'id_campana' => $this->id_campana,
            'nombre_campana' => $this->nombre_campana,
            'usuario_id' => $this->usuario_id,
        ];
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
