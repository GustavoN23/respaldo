<?php

namespace App\Http\Livewire;

use App\Models\Campana;
use Livewire\Component;

class MascotaCampanas extends Component
{
    public function render()
    {
        // $campanas = Campana::all();
        // dd($campanas);

        //Gracias a la relacion de nuestro modelo de Campana.php y Vacuna.php podemos usar "whereHas" y filtrar
        //por relacion definida en el modelo Campana.php (vacuna). E iniciamos la consulta 
        $campanas = Campana::whereHas('vacuna', function ($query) {
            //$query hace la consulta a la relacion. Y especificamos el campo y el valor que debera tener ese mismo
                $query->where('tipo_user', 'mascota');
            })->paginate(2);

        return view('livewire.mascota-campanas', [
            'campanas' => $campanas
        ]);
    }
}
