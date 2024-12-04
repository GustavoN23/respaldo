<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarHistorial extends Component
{
    public $inscrito;
    
    public function render()
    {
        return view('livewire.mostrar-historial');
    }
}
