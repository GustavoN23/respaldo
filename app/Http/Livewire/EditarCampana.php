<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Vacuna;
use App\Models\Campana;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditarCampana extends Component
{
    // public $id; //Este ($id solo) no funcionara por directriz livewire, debemos ponerlo como $campana_id
    public $campana_id;
    public $titulo;
    public $vacuna;
    public $fecha;
    public $hora_desde;
    public $hora_hasta;
    // public $departamento;
    public $municipio;
    public $direccion;
    public $empresa;
    public $imagen;
    public $descripcion;
    public $selectedDepartamento;
    public $municipios = [];
    public $imagen_nueva;
    
    use WithFileUploads;

    protected $rules = [
        'titulo' => ['required', 'string'],
        'vacuna' => ['required'],
        'fecha' => ['required', 'date', 'after:today'],
        'hora_desde' => ['required', 'date_format:H:i', 'before:hora_hasta', 'after_or_equal:06:00'],
        'hora_hasta' => ['required', 'date_format:H:i', 'after:hora_desde', 'before_or_equal:19:00'],
        'selectedDepartamento' => ['required'],//Cambie el campo departamento por selectedDepartamento
        'municipio' => ['required'],
        'direccion' => ['required'],
        'empresa' => ['required'],
        'imagen_nueva' => ['nullable', 'image', 'max:1024'],//'nullable' indica que este campo pueder ir vacio
        'descripcion' => ['required'],
    ];

    //mount: Cuando el componente haya sido instanciado y solamente se ejecuta una vez (util para actualizar)
    //Con este mount() llevamos los valores de la campaña a los campos al darle editar
    public function mount(Campana $campana)
    {
        //$campana->id; es el que viene desde nuestra BD
        $this->campana_id = $campana->id;
        $this->titulo = $campana->titulo;
        $this->vacuna = $campana->vacuna_id;
        //En nuestro form formateamos la fecha y tenemos d/m/Y, pero desde la BD viene en el formato
        //de Y/m/d. Asi que formateamos de nuevo la fecha
        $this->fecha = Carbon::parse($campana->fecha)->format('Y-m-d');
        $this->hora_desde = Carbon::parse($campana->hora_desde)->format('h:i');
        $this->hora_hasta = Carbon::parse($campana->hora_hasta)->format('h:i');
        $this->selectedDepartamento = $campana->departamento;
        $this->municipio = $campana->municipio;
        $this->direccion = $campana->direccion;
        $this->empresa = $campana->empresa;
        $this->imagen = $campana->imagen;
        $this->descripcion = $campana->descripcion;
        //Debemos llamar el metodo, para asignarle el valor actual segun el dpartamento y municipio al input
        //select de municipio
        $this->updatedSelectedDepartamento($this->selectedDepartamento);
    }

    public function editarCampana()
    {
        //INFO DEL FORMULARIO
        $datos = $this->validate();

        //ENCONTRAMOS LA CAMPAÑA A EDITAR
        $campana = Campana::find($this->campana_id);

        //REVISAR SI HAY UNA IMAGEN NUEVA
        if($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/campaigns');

            //Quitamos public/vacantes/ de la url de la imagen, '' no quitamos nada y solo almacenamos el nombre de la
            //imagen y su extension
            $datos['imagen'] = str_replace('public/campaigns/', '', $imagen);

            //Remplazamos la imagen anterior por la nueva
            Storage::delete('public/campaigns/'. $campana->imagen);
        }

        //REESCRIBIR LA INFO DE LA BD
        //campana->titulo; viene desde la BD. $datos['titulo']; es la referencia del input
        $campana->titulo = $datos['titulo'];
        $campana->vacuna_id = $datos['vacuna'];
        $campana->fecha = $datos['fecha'];
        $campana->hora_desde = $datos['hora_desde'];
        $campana->hora_hasta = $datos['hora_hasta'];
        $campana->departamento = $datos['selectedDepartamento'];
        $campana->municipio = $datos['municipio'];
        $campana->empresa = $datos['empresa'];
        //Si hay una nueva imagen ($datos['imagen']) la asigna. Si no (??), deja la que ya habia ($campana->imagen)
        $campana->imagen = $datos['imagen'] ?? $campana->imagen;
        $campana->descripcion = $datos['descripcion'];

        //ACTUALIZAR LA CAMPAÑA
        $campana->save();

        session()->flash('mensaje', 'Campaña actualizada correctamente');

        return redirect()->route('campanas.index');
    }

    public function render()
    {
        $vacunas = Vacuna::all();
        // dd($vacunas);

        //Extraemos el contenido de nuestro json
        $departamentosJson = Storage::disk('public')->get('json/departamentos.json');

        //Volvemos el json en un array
        $departamentos = json_decode($departamentosJson, true);
        // dd($departamentos);

        return view('livewire.editar-campana', [
            'vacunas' => $vacunas,
            'departamentos' => $departamentos
        ]);
    }

    public function updatedSelectedDepartamento($value)
    {
        //Extraemos el contenido de nuestro json
        $departamentosJson = Storage::disk('public')->get('json/departamentos.json');
        
        //Volvemos el json en un array
        $departamentos = json_decode($departamentosJson, true);
        
        //Iteramos cada departamento en el array, como "departamento":"Amazonas", etc
        foreach ($departamentos as $departamento) {
            //$departamento['departamento']: El nombre del departamento coincide con el valor seleccionado, es decir
            // === $value: que es el departamento que el usuario elije en el select (por ej, Antioquia)
            if ($departamento['departamento'] === $this->selectedDepartamento) {
                //Si hay una coincidencia, se muestra los municipios de ese departamento a la propiedad $municipios del componente Livewire
                $this->municipios = $departamento['municipios'];
                break;//Salimos del bucle
            }
        }
    }
}
