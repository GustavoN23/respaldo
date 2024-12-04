<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InscritosCampana extends Component
{
    public $campana;
    
    public function render()
    {
        return view('livewire.inscritos-campana');
    }
}
