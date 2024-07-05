<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('citas.register', [
            'pacientes' => Paciente::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Cita::create($request->validate([
                'id_paciente' => 'required|string',
                'asunto' => 'required|string',
                'fecha' => 'required|string',
                'hora' => 'required|string'
            ]));
            return redirect()->route('citas.index')->withSuccess('Cita creada correctamente');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Hubo un problema al crear la cita. Por favor intentelo de nuevo']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        //
    }
}
