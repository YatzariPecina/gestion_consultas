<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Tipo_servicio;
use App\Models\TipoServicio;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ventas.crudServicios.listServicios', [
            'servicios' => Servicio::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ventas.crudServicios.register', [
            'tipos_servicio' => TipoServicio::all()
        ]);
    }

    public function storeTipoServicio(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|max:255',
        ]);
    
        TipoServicio::create($validated);
    
        // Redirigir al usuario a la página de éxito o lista de tipos de servicios
        return redirect()->route('servicios.index')->with('success', 'Tipo de servicio creado exitosamente.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Servicio::create($request->validate([
                'nombre' => 'required',
                'precio' => 'required',
                'id_tipo_servicio' => 'required',
            ]));
            return redirect()->route('servicios.index')->withSuccess('Servicio creado');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => 'Hubo un problema al modificar los datos. Por favor, inténtalo de nuevo.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
