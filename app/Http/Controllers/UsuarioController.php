<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuarios.listUsuarios', [
            'usuarios' => User::latest()->get()
        ]);
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
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            //Eliminar al usuario
            $user = User::findOrFail($id);
            $user->delete();

            //Retornar a la vista para visualizar el cambio
            return redirect()->route('usuarios.index')->withSuccess('usuario eliminado');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => 'Hubo un problema al eliminar al usuario. Por favor, inténtalo de nuevo.']);
        }
    }
}
