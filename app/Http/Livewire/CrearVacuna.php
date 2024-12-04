<?php

namespace App\Http\Livewire;

use App\Models\Vacuna;
use Livewire\Component;

class CrearVacuna extends Component
{
    public $nombre;
    public $tipo_user;
    public $numeroDosis = 1;
    public $tiempo_entre_dosis = [];
    public $tipo;
    public $precio;
    public $edad_desde;
    public $edad_hasta;
    public $genero;
    public $enfermedad;
    public $sintomasAdversos;
    public $cuidadosPos;
    public $insumos;
    public $metodoAplicacion;
    public $sintomas;

    //Validaciones formulario crear-vacuna.blade.php
    protected $rules = [
        'nombre' => ['required', 'string'],
        'numeroDosis' => ['required', 'integer', 'min:1'],
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
        'tiempo_entre_dosis.*.anos' => ['nullable', 'integer', 'min:0'],
        'tiempo_entre_dosis.*.meses' => ['nullable', 'integer', 'min:0'],
        'tiempo_entre_dosis.*.dias' => ['nullable', 'integer', 'min:0'],
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
        $vacuna = Vacuna::create([
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

        // Si el número de dosis es 1, vaciar la tabla de tiempos entre dosis
        if ($vacuna->numero_dosis == 1) {
            $vacuna->tiemposEntreDosis()->delete();  // Eliminar todos los registros de tiempos entre dosis
        } else {
            // Si hay más de una dosis, se actualizan o crean los tiempos entre dosis
            if (!empty($this->tiempo_entre_dosis)) {
                $dosis_numero = 2; // Comenzar desde 2 para la primera dosis de tiempo entre dosis

                // Limitar el número de registros a (numero_dosis - 1)
                foreach (array_slice($this->tiempo_entre_dosis, 0, $vacuna->numero_dosis - 1) as $index => $tiempo) {
                    // Calcular el tiempo total en días
                    $dias = ($tiempo['anos'] ?? 0) * 365 + ($tiempo['meses'] ?? 0) * 30 + ($tiempo['dias'] ?? 0);
                    
                    // Crear o actualizar el registro en la tabla de tiempos entre dosis
                    $vacuna->tiemposEntreDosis()->updateOrCreate(
                        ['dosis_numero' => $dosis_numero],
                        ['dias' => $dias]
                    );

                    // Incrementar el valor de dosis_numero para la siguiente dosis
                    $dosis_numero++;
                }
            }
        }


        //Mensaje exito
        session()->flash('mensaje', 'Vacuna creada correctamente');

        return redirect()->route('vacunas.index');
    }

    public function render()
    {
        return view('livewire.crear-vacuna');
    }
}
