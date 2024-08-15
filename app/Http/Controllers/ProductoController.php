<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ventas.crudProductos.listProductos', [
            'productos' => Producto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ventas.crudProductos.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Producto::create($request->validate([
            'nombre' => 'required|string',
            'marca' => 'required|string',
            'costo' => 'required|string',
            'cantidad' => 'required'
        ]));
        
        return redirect()->route('productos.index')->with('success', 'Se ha agregado un producto');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('ventas.crudProductos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->validate([
            'nombre' => 'required|string',
            'marca' => 'required|string',
            'costo' => 'required|string',
            'cantidad' => 'required'
        ]));
        $producto->save();
        return redirect()->route('productos.index')->withSuccess('Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        try {
            //Eliminar el paciente de la base de datos
            $producto->delete();

            //Redirigir a el index con success
            return redirect()->route('producto.index')->withSuccess('Producto eliminado');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => 'Hubo un error al eliminar el producto']);
        }
    }
}
