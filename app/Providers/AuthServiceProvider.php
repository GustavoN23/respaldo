<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Campana;
use App\Models\Inscrito;
use App\Models\Vacuna;
use App\Policies\UsuarioPolicy;
use App\Policies\VacunaPolicy;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //Igual que en Kernel.php para los middleware, aqui debemos registrar nuestro Policies
        //No me funciono al poner el Campana::class => CampanaPolicy::class
        Vacuna::class => VacunaPolicy::class,
        Inscrito::class => UsuarioPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing( function($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verificar cuenta')
                ->line('Tu cuenta ya esta casi lista, solo da click en el siguiente enlace')
                ->action('Verificar cuenta', $url)
                ->line('Si no creaste esta cuenta, ignora este mensaje');
        });
    }
}
