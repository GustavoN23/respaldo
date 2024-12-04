<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inscrito;

class MostrarHistoriales extends Component
{
    public function render()
    {
        // $historiales = Inscrito::whereHas('', function ($query) {
        //     //$query hace la consulta a la relacion. Y especificamos el campo y el valor que debera tener ese mismo
        //         $query->where('asistio', 1);
        //     })->get();
        // dd($historiales);

        //Obtenemos los registros que correspondan a es id de usuario que inicio sesion, y en las campañas
        //en las cuales este registrado como que si asistio (1)
        $historiales = Inscrito::where('user_id', auth()->user()->id)
                                ->where('asistio', 1)
                                ->get();
        
        return view('livewire.mostrar-historiales', [
            'historiales' => $historiales
        ]);
    }
}
