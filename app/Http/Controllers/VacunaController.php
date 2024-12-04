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

        return view('vacunas.index');
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
        //Tomando el metodo en el que hicimos la verificicacion en nuestro policy, pasandole la instancia de
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
        //Usando el policy (VacunaPolicy.php) 
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
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
