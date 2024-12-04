<?php

namespace App\Http\Controllers;

use App\Models\Vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Vacuna::class);

        $vacunas = Vacuna::all();  // O la lógica que desees para obtener las vacunas

        return view('vacunas.index', compact('vacunas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Vacuna::class);

        return view('vacunas.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacuna $vacuna)
    {
        //Tomando el método en el que hicimos la verificación en nuestro policy, pasándole la instancia de
        //la vacuna para reconocer el user_id que crea la vacuna
        $this->authorize('update', $vacuna);

        return view('vacunas.edit', [
            'vacuna' => $vacuna
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacuna $vacuna)
    {
        // Usando el policy (VacunaPolicy.php)
        $this->authorize('view', $vacuna);

        return view('vacunas.show', [
            'vacuna' => $vacuna
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            // Otros campos para la vacuna
            'tiempo_entre_dosis' => 'array',  // Asegúrate de que sea un array
            'tiempo_entre_dosis.*.anos' => 'nullable|integer|min:0',
            'tiempo_entre_dosis.*.meses' => 'nullable|integer|min:0',
            'tiempo_entre_dosis.*.dias' => 'nullable|integer|min:0',
        ]);

        // Crear la nueva vacuna
        $vacuna = Vacuna::create([
            'nombre' => $validatedData['nombre'],
            // Otros campos de la vacuna
        ]);

        // Guardar los tiempos entre dosis
        foreach ($validatedData['tiempo_entre_dosis'] as $key => $tiempo) {
            $dias = ($tiempo['anos'] ?? 0) * 365 + ($tiempo['meses'] ?? 0) * 30 + ($tiempo['dias'] ?? 0);

            // Crear la relación de tiempos entre dosis
            $vacuna->tiemposEntreDosis()->create([
                'dosis_numero' => $key + 1,  // Número de dosis
                'dias' => $dias,  // Total de días
            ]);
        }

        return redirect()->route('vacunas.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vacuna = Vacuna::findOrFail($id);

        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            // Otros campos de la vacuna
            'tiempo_entre_dosis' => 'array',  // Asegúrate de que sea un array
            'tiempo_entre_dosis.*.anos' => 'nullable|integer|min:0',
            'tiempo_entre_dosis.*.meses' => 'nullable|integer|min:0',
            'tiempo_entre_dosis.*.dias' => 'nullable|integer|min:0',
        ]);

        // Actualizar los datos de la vacuna
        $vacuna->update([
            'nombre' => $validatedData['nombre'],
            // Otros campos de la vacuna
        ]);

        // Actualizar los tiempos entre dosis
        foreach ($validatedData['tiempo_entre_dosis'] as $key => $tiempo) {
            $dias = ($tiempo['anos'] ?? 0) * 365 + ($tiempo['meses'] ?? 0) * 30 + ($tiempo['dias'] ?? 0);

            // Crear o actualizar el tiempo entre dosis correspondiente
            $vacuna->tiemposEntreDosis()->updateOrCreate(
                ['dosis_numero' => $key + 1],
                ['dias' => $dias]
            );
        }

        return redirect()->route('vacunas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vacuna = Vacuna::findOrFail($id);

        // Verificar si se puede eliminar (esto depende de tu lógica de autorización)
        $this->authorize('delete', $vacuna);

        // Eliminar la vacuna
        $vacuna->delete();

        return redirect()->route('vacunas.index');
    }
}
