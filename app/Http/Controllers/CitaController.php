<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
    public function createCita(Paciente $paciente)
    {
        return view('citas.register', [
            'paciente' => compact('paciente'),
        ]);
    }

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
            $validatedData = $request->validate([
                'id_paciente' => 'required|integer|min:1',
                'descripcion' => 'nullable|string|max:255',
                'fecha_cita' => [
                    'required',
                    'date',
                    'after_or_equal:' . Carbon::today()->format('Y-m-d')
                ],
                'hora_cita' => 'required|date_format:H:i',
            ]);

            Cita::create($validatedData);
            return redirect()->route('agenda')->withSuccess('Cita creada correctamente');
        } catch (\Throwable $th) {
            // En lugar de simplemente devolver el error, puedes manejar específicamente el caso de fechas inválidas
            if ($th instanceof ValidationException) {
                return back()->withErrors(['error' => 'La cita no puede ser para un día anterior a hoy.']);
            } else {
                return back()->withErrors(['error' => 'Hubo un error al generar la cita ']);
            }
        }
    }

    public function showAgenda()
    {

        $citas = Cita::all();
        $events = [];

        foreach ($citas as $cita) {
            $events[] = [
                "title" => $cita->descripcion,
                "start" => $cita->fecha_cita . " " . $cita->hora_cita,
                "end" => $cita->fecha_cita
            ];
        }

        return view('agenda.agenda', compact('events'));
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
