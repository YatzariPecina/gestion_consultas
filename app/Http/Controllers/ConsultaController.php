<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
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
    public function create(Cita $cita)
    {
        $paciente = Paciente::find($cita->id_paciente);

        if (!$paciente) {
            abort(404, 'Paciente no encontrado');
        }

        return view('consultas.register', [
            'cita' => $cita,
            'paciente' => $paciente
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Consulta $consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulta $consulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
        //
    }
}
