<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Campana;
use Livewire\Component;

class MostrarMascotaCampana extends Component
{
    public $campana;
    public $hora_desde;
    public $hora_hasta;
    
    //Usamos este mount para poder formatear la vista de la hora con (->format('h:i')) 
    public function mount(Campana $campana)
    {
        $this->campana = $campana;
        $this->hora_desde = Carbon::parse($campana->hora_desde);
        $this->hora_hasta = Carbon::parse($campana->hora_hasta);
    }

    public function render()
    {
        return view('livewire.mostrar-mascota-campana');
    }
}
