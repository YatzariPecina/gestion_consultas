<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use Illuminate\Http\Request;

class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ventas.crudEstudios.listEstudios', [
            'estudios' => Estudio::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombreDelEstudio' => 'required|string',
            'precio' => 'required'
        ]);

        Estudio::create($datos);

        return redirect()->route('estudios.index')->withSuccess('Estudio agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudio $estudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudio $estudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudio $estudio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudio $estudio)
    {
        try {
            //Eliminar al medico
            $estudio->delete();

            //Retornar a la vista para visualizar el cambio
            return redirect()->route('estudios.index')->withSuccess('Estudio eliminado');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => 'Hubo un problema al eliminar al medico. Por favor, inténtalo de nuevo.']);
        }
    }
}
