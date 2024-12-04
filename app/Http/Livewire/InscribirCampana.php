<?php

namespace App\Http\Livewire;

use App\Models\Pago;
use App\Models\Campana;
use App\Notifications\NuevaInscripcion;
use App\Notifications\NuevoInscrito;
use Livewire\Component;

class InscribirCampana extends Component
{
    public $campana;
    public $genero;
    public $documento;
    public $pago;

    protected $rules = [
        'genero' => ['required', 'string', 'in:masculino,femenino'],
        'documento' => ['required', 'numeric', 'digits_between:7,10']
    ];

    public function mount(Campana $campana)
    {
        $this->campana = $campana;
        $this->genero = '';
    }

    public function inscribirme() 
    {
        $datos = $this->validate();

        if($this->campana->vacuna->precio === 0) {
            //Usando la relacion de inscritos hecha en Campana.php. Revisamos si el usuario ya esta registrado
            //en una campaña especifica (por medio del user_id y campana_id)
            //where('user_id', auth()->user()->id)->exists(): si el user_id ya existe en esa campana_id
            if ($this->campana->inscritos()->where('user_id', auth()->user()->id)->exists()) {
    
                //No dejamos que se inscriba de nuevo, mostramos el mensaje (escondemos el form) y lo redirigimos
                //a esta misma pagina
                session()->flash('inscrito', 'Ya te inscribiste anteriormente a esta jornada');
                return redirect()->back();
            }
    
            //Crear el usuario que se va inscribir a la campaña
            //En Campana.php creamos la relacion que vamos a usar aqui (inscritos()). Como esa relacion ya esta
            $this->campana->inscritos()->create([//establecida 
    
                'user_id' => auth()->user()->id,
                'genero' => $datos['genero'],
                'documento' => $datos['documento'],
                'edad' => 'edad no especificada',
                //Este cero lo editara el admin (por un 1) si el usuario va a la jornada y se vacuna
                'asistio' => 0
            ]);
        }

        //CREAR NOTIFICACION Y ENVIAR EL EMAIL al ADMINISTRADOR
        $this->campana->administrador->notify(new NuevoInscrito($this->campana->id, $this->campana->titulo, auth()->user()->id));

        //ENVIAR EMAIL DE INSCRIPCION al USUARIO
        $this->campana->usuario->notify(new NuevaInscripcion($this->campana->id, $this->campana->titulo, auth()->user()->id));

        //Mostrar el mensaje de exito
        session()->flash('mensaje', 'Se realizo la inscripcion correctamente. ¡Te esperamos!');

        //Redirigimos al usuario a la misma pagina donde envio el mensaje
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.inscribir-campana');
    }
}
