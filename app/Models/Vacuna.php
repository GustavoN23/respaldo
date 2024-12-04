<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'numeroDosis',
        'tipo',
        'precio',
        'tipo_user',
        'edad_desde',
        'edad_hasta',
        'genero',
        'enfermedad',
        'sintomasAdversos',
        'cuidadosPos',
        'sintomas',
        'insumos',
        'metodoAplicacion',
        'user_id',
    ];
}
