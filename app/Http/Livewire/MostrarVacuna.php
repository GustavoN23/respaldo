<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarVacuna extends Component
{
    public $vacuna;

    public function render()
    {
        return view('livewire.mostrar-vacuna');
    }
}
