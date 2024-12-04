<?php

namespace App\Http\Controllers;

use App\Models\Campana;
use Illuminate\Http\Request;

class CampanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Campana::class);

        return view('campanas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $this->authorize('create', Campana::class);

        return view('campanas.create');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campana $campana)
    {
        $this->authorize('update', $campana);

        return view('campanas.edit', [
            'campana' => $campana
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Campana $campana)
    {
        $this->authorize('view', $campana);

        return view('campanas.show', [
            'campana' => $campana
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
