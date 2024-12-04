<?php

namespace App\Http\Livewire;

use App\Models\Vacuna;
use App\Models\Campana;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CrearCampana extends Component
{
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
        'imagen' => ['required', 'image', 'max:2048'],
        'descripcion' => ['required']
    ];

    public function mount()
    {
        //Para que funcione el selected en los inputs de tipo select
        $this->vacuna = '';
        $this->selectedDepartamento = '';
        $this->municipio = '';
    }

    public function crearCampana() {

        $datos = $this->validate();

        //Almacenando la imagen
        $imagen = $this->imagen->store('public/campaigns');

        //Quitamos public/vacantes/ de la url de la imagen, '' no quitamos nada y solo almacenamos el nombre de la
        //imagen y su extension
        $datos['imagen'] = str_replace('public/campaigns/', '', $imagen);

        //Creamos la campaña
        Campana::create([

            'titulo' => $datos['titulo'],
            'vacuna_id' => $datos['vacuna'],
            'fecha' => $datos['fecha'],
            'hora_desde' => $datos['hora_desde'],
            'hora_hasta' => $datos['hora_hasta'],
            //'departamento': viene del fillable (BD). $datos['selectedDepartamento']: es el valor que tiene en input
            'departamento' => $datos['selectedDepartamento'],
            'municipio' => $datos['municipio'],
            'direccion' => $datos['direccion'],
            'empresa' => $datos['empresa'],
            'imagen' => $datos['imagen'],
            'descripcion' => $datos['descripcion'],
            'user_id' => auth()->user()->id,//Pasamos el usuario autenticado (auth()) que crea la vacante
        ]);

        //Mensaje exito
        session()->flash('mensaje', 'Campaña creada correctamente');

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

        return view('livewire.crear-campana', [
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
            if ($departamento['departamento'] === $value) {
                //Si hay una coincidencia, se muestra los municipios de ese departamento a la propiedad $municipios del componente Livewire
                $this->municipios = $departamento['municipios'];
                break;//Salimos del bucle
            }
        }
    }
}
