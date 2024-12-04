<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'genero',
        'documento',
        'edad',
        'asistio',
        'user_id',
        'campana_id'
    ];

    //Relacionando la tabla inscritos con la tabla users. (Para acceder a toda la info del user)
    //Usado en index/inscritos-campana.blade.php
    public function user() //Un inscrito tiene un unico user
    {
        return $this->belongsTo(User::class);
    }

    //Relacion de inscritos con campanas. (Para acceder a los valores de campana en las vistas de inscrito)
    //Usado en el volver de edit/editar-asistencia.blade.php
    public function campana()
    {
        return $this->belongsTo(Campana::class);
    }
}
