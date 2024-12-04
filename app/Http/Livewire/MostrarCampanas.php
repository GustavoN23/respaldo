<?php

namespace App\Http\Livewire;

use App\Models\Campana;
use Livewire\Component;

class MostrarCampanas extends Component
{
    //Para que las funciones escuchen por un metodo (de livewire) que se emita en las vistas, 
    //como (wire:click="$emit('eliminarVacante')")
    protected $listeners = ['eliminarCampana'];

    public function eliminarCampana(Campana $campana)
    {
        $campana->delete();
    }

    public function render()
    {
        $campanas = Campana::where('user_id', auth()->user()->id)->paginate(4);
        // dd($campanas);

        return view('livewire.mostrar-campanas', [
            'campanas' => $campanas
        ]);
    }
}
