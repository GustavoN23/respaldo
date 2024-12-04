<?php

namespace App\Http\Controllers;

use App\Models\Campana;
use App\Models\Inscrito;
use Illuminate\Http\Request;

class InscritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Campana $campana)
    {
        //Protegida con el middleware de 'rol.admin'

        return view('inscritos.index',[
            'campana' => $campana
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscrito $inscrito)
    {
        //Protegida con el middleware de 'rol.admin'
        
        return view('inscritos.edit', [
            'inscrito' => $inscrito
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
