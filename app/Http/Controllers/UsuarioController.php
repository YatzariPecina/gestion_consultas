<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuarios.listUsuarios', [
            'users' => User::latest()->get()
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
        return view('usuarios.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                'rol' => ['required', 'string', 'max:255'],
            ]);
    
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'rol' => $request->rol,
            ]);
            $user->save();
    
            if ($request->rol === 'Medico') {
                $medico = Medico::find($user->id, 'user_id');
                $medico->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);
                $medico->save();
            }
    
            return redirect()->route('users.index')->withSuccess('Usuario agregado con exito');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->withErrors(['error' => $th->getMessage()]);
        }
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
            return redirect()->route('users.index')->withSuccess('Usuario eliminado');
        } catch (\Exception $th) {
            return back()->withErrors(['error' => 'Hubo un problema al eliminar al usuario. Por favor, inténtalo de nuevo.']);
        }
    }
}
