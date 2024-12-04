<?php

namespace App\Http\Livewire;

use App\Models\Vacuna;
use Livewire\Component;

class MostrarVacunas extends Component
{
    //Para que las funciones escuchen por un metodo (de livewire) que se emita en las vistas, 
    //como (wire:click="$emit('eliminarVacante')") el cual es un evento de livewire
    protected $listeners = ['eliminarVacuna'];

    public function eliminarVacuna(Vacuna $vacuna) 
    {   
        $vacuna->delete();
    }

    public function render()
    {
        $vacunas = Vacuna::where('user_id', auth()->user()->id)->paginate(4);

        // dd($vacunas);

        return view('livewire.mostrar-vacunas', [
            'vacunas' => $vacunas
        ]);
    }
}
