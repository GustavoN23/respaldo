<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'segundoNombre',
        'apellido',
        'segundoApellido',
        'email',
        'password',
        'rol', // 1 = persona, 2 = mascota, 3 = admin  
        'tipo_doc',
        'documento',
        'genero',
        'nacimiento',
        // modificado
        'edad',
        'orientacionSexual',
        'pais',
        'departamento',
        'municipio',
        // 'lugarNacimiento',
        'regimenAfiliacion',
        'eps',
        'etnia',
        'desplazado',
        'discapacidad',
        'descripcionDiscapacidad',
        'victimaConflicto',
        'estudiante',
        'descripcionEstudiante',
        'paisResidencia',
        'departamentoResidencia',
        'municipioResidencia',
        'barrio',
        'comuna',
        'area',
        'direccion',
        'celular',
        'telefono',
        'autoriza'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'nacimiento'=> 'date'
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }
}
