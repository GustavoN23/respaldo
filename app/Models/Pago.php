<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_vacuna',
        'precio',
        'status',
        'inscrito_id'
    ];

    public function inscrito()
    {
        return $this->belongsTo(Inscrito::class);
    }
}
