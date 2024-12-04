<?php

namespace App\Http\Livewire;

use App\Models\Vacuna;
use Livewire\Component;

class CrearVacuna extends Component
{
    public $nombre;
    public $tipo_user;
    public $numeroDosis;
    public $tipo;
    public $precio;
    public $edad_desde;
    public $edad_hasta;
    public $genero;
    public $enfermedad;
    // public $lote;//Ensayo ajuste
    public $sintomasAdversos;
    public $cuidadosPos;
    public $insumos;
    public $metodoAplicacion;
    public $sintomas;

    //Validaciones formulario crear-vacuna.blade.php
    protected $rules = [
        'nombre' => ['required', 'string'],
        'numeroDosis' => ['required', 'numeric'],
        'tipo_user' => ['required'],
        'tipo' => ['required'],
        'precio' => ['required', 'numeric'],
        'edad_desde' => ['required'],
        'edad_hasta' => ['required'],
        'genero' => ['required', 'in:masculino,femenino,ambos'],
        'enfermedad' => ['required'],
        'sintomasAdversos' => ['required'],
        'cuidadosPos' => ['required'],
        'sintomas' => ['required'],
        'insumos' => ['required'],
        'metodoAplicacion' => ['required']
    ];

    public function mount()
    {
        //Para que funcione el selected en los inputs de tipo select
        $this->tipo_user = 'persona'; // o '' según prefieras
        $this->tipo = 'gratis';
        $this->genero = '';
        $this->precio = 0;
    }


    public function crearVacuna() 
    {
        $datos = $this->validate();

        //Crear la vacuna
        Vacuna::create([
            //'': campos del fillable Vacuna.php.  $datos['']: datos infresados en los inputs
            'nombre' => $datos['nombre'],
            'numeroDosis' => $datos['numeroDosis'],
            'tipo_user' => $datos['tipo_user'],
            'tipo' => $datos['tipo'],
            'precio' => $datos['precio'],
            'edad_desde' => $datos['edad_desde'],
            'edad_hasta' => $datos['edad_hasta'],
            'genero' => $datos['genero'],
            'enfermedad' => $datos['enfermedad'],
            'sintomasAdversos' => $datos['sintomasAdversos'],
            'cuidadosPos' => $datos['cuidadosPos'],
            'sintomas' => $datos['sintomas'],
            'insumos' => $datos['insumos'],
            'metodoAplicacion' => $datos['metodoAplicacion'],
            'user_id' => auth()->user()->id,//Pasamos el usuario autenticado (auth()) que crea la vacante
        ]);

        //Mensaje exito
        session()->flash('mensaje', 'Vacuna creada correctamente');

        return redirect()->route('vacunas.index');
    }

    public function render()
    {
        return view('livewire.crear-vacuna');
    }
}
