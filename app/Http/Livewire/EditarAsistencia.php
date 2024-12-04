<?php

namespace App\Http\Livewire;

use App\Models\Campana;
use Livewire\Component;
use App\Models\Inscrito;

class EditarAsistencia extends Component
{
    public $inscrito_id;
    public $edad;
    public $asistio;
    public $inscrito;//vrble que se pasa en la url de volver ($inscrito->campana->id). Gracias a la relacion
    //de los modelos

    protected $rules = [
        'edad' => ['required', 'string'],
        'asistio' => ['required', 'boolean']//Los input checkbos se evaluan si son true o false
    ];

    public function mount(Inscrito $inscrito)
    {
        $this->inscrito_id = $inscrito->id;
        $this->edad = $inscrito->edad;
        $this->asistio = $inscrito->asistio;
    }

    public function editarAsistencia()
    {
        //Validamos que el input si sea un boolean
        $datos = $this->validate();

        //Tomamos el id del usuario que esta inscrito y asistio a la campaña
        $inscrito = Inscrito::find($this->inscrito_id);

        //Si el usuario esta inscrito y asistio a la campaña de vacunacion
        if($inscrito) {

            //Cambiamos el "edad no especificada" que viene por default en nuestra BD. Y el admin ingresa la
            //edad del usuario que recibio la vacuna, el dia de la aplicacion
            $inscrito->edad = $datos['edad'];
            //Si el usuario asistio a la jornada (marcamos el ckeckbox) y guardamos un 1 en la BD
            //Si desmarcamos el checkbox, se asigna un cero a la BD (quiere decir que el usario no fue)
            $inscrito->asistio = $this->asistio ? 1 : 0;

            $inscrito->save();

            session()->flash('mensaje', 'Asistencia actualizada correctamente');

            // return redirect()->route('inscritos.edit');
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.editar-asistencia');
    }
}
