<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pacientes.listPacientes', [
            'pacientes' => Paciente::latest()->paginate(4),
            'numMedicos' => Medico::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'pacientes.register',
            [
                'medicos' => Medico::latest()->get()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            //Validar datos
            $request->validate([
                'nombre' => 'required|string|max:255',
                'fecha_nacimiento' => 'required|date',
                'sexo' => 'required|string|max:10',
                'telefono_paciente' => 'required|string|max:20',
                'correo' => 'required|string|email|max:255',
                'direccion' => 'nullable|string|max:255',
                'nacionalidad' => 'nullable|string|max:50',
                'nombre_contacto_emergencia' => 'required|string|max:255',
                'telefono_contacto_emergencia' => 'required|string|max:20',
                'RFC' => 'nullable|string|max:13',
                'observaciones' => 'nullable|string',
                'id_medico' => 'required|string'
            ]);

            //Crear el paciente
            Paciente::create($request->all());

            //Una vez creado redirigir al index con el mensaje de paciente agregado
            return redirect()->route('pacientes.index')->withSuccess('Nuevo paciente agregado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', [
            'paciente' => $paciente,
            'medicos' => Medico::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        try {
            //Con un request modificar el paciente con los datos validados con el request
            $paciente->update($request->validated([
                'nombre' => 'required|string|max:50',
                'edad' => 'required|integer|min:1|max:10000',
                'sexo' => 'required|string|max:1',
                'telefono' => 'required|string|max:250',
                'id_medico' => 'required|string|max:250'
            ]));
            //Redirigir a el index para visualizar el paciente
            return redirect()->route('pacientes.index')->withSuccess('Paciente actualizado');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => 'Hubo un error al modificar los datos del paciente']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        try {
            //Eliminar el paciente de la base de datos
            $paciente->delete();

            //Redirigir a el index con success
            return redirect()->route('pacientes.index')->withSuccess('Paciente eliminado');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => 'Hubo un error al eliminar al paciente']);
        }
    }
}
