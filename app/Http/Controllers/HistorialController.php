<?php

namespace App\Http\Controllers;

use App\Models\Inscrito;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Inscrito::class);

        return view('historiales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscrito $inscrito)
    {
        $this->authorize('view', $inscrito);

        return view('historiales.show', [
            'inscrito' => $inscrito
        ]);
    }

    public function pdf()
    {
        $this->authorize('viewAny', Inscrito::class);

        $historiales = Inscrito::where('user_id', auth()->user()->id)
                                ->where('asistio', 1)
                                ->get();

        $pdf = Pdf::loadView('historiales.pdf', [
            'historiales' => $historiales
        ]);
        // return $pdf->stream();
        return $pdf->download('certificado_vacunacion.pdf');

        // return view('historiales.pdf', [
        //     'historiales' => $historiales
        // ]);
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
