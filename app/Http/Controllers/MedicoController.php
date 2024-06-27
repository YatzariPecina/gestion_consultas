<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Models\Medico;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('medicos.listMedicos', [
            'medicos' => Medico::latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicos.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicoRequest $request)
    {
        try {
            //Crear un nuevo medico validando el request
            Medico::create($request->validated());
            //Redireccionar al index con success
            return redirect()->route('medicos.index')->withSuccess('Medico agregado con exito');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => 'Hubo un problema al insertar los datos. Por favor, inténtalo de nuevo.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico)
    {
        return view('medicos.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicoRequest $request, Medico $medico)
    {
        try {
            //Validar los datos del request, que coincidan con lo que lo pedido para lo datos
            $medico->fill($request->validated());
            //Guardar el cambio
            $medico->save();
            //Retornar a la vista
            return redirect()->route('medicos.index')->withSuccess('Medico actualizado');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => 'Hubo un problema al modificar los datos. Por favor, inténtalo de nuevo.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        try {
            //Eliminar al medico
            $medico->delete();

            //Retornar a la vista para visualizar el cambio
            return redirect()->route('medicos.index')->withSuccess('Medico eliminado');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => 'Hubo un problema al eliminar al medico. Por favor, inténtalo de nuevo.']);
        } catch (QueryException $e) {
            // Comprobar si el error es debido a una restricción de llave foránea
            if (strpos($e->getMessage(), 'foreign key constraint fails') !== false) {
                // Mostrar un mensaje personalizado para el caso de restricción de llave foránea
                return back()->withErrors(['error' => 'No se puede eliminar al médico porque tiene pacientes asociados.']);
            } else {
                // Para otros errores, mostrar el mensaje genérico
                return back()->withErrors(['error' => 'Hubo un problema al eliminar al médico. Por favor, inténtalo de nuevo.']);
            }
        }
    }
}
