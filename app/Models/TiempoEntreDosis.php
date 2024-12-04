<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiempoEntreDosis extends Model
{
    
    protected $table = 'tiempos_entre_dosis';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'vacuna_id',   // La relación con la tabla de vacunas
        'dosis_numero', // El número de la dosis (1, 2, 3, ...)
        'dias',         // El número de días entre las dosis
    ];

    // Definir la relación con el modelo Vacuna
    public function vacuna()
    {
        return $this->belongsTo(Vacuna::class);  // Relación inversa con Vacuna
    }
}
