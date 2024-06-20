<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function MostrarFormularioRol()
    {
        $users = User::all();
        return view('admin.rol', compact('users'));
    }

    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function DarRol(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'role' => 'required|string|in:user,admin', 
            ]);

            $user = User::find($request->user_id);

            if ($user->id === Auth::id() && $request->role !== 'admin') {
                return redirect()->back()->with('error', 'No puedes quitarte el rol de administrador a ti mismo.');
            }

            $user->role = $request->role;
            $user->save();

            return redirect()->back()->with('success', 'Rol asignado correctamente.');
        }

     return redirect('/')->with('error', 'No tienes permisos de administrador.');
    
    }
    public function destroy(User $user) {
        if ($user->id === auth()->user()->id) {
            return redirect()->route('admin.index')->with('error', 'No puedes eliminarte a ti mismo');
        }

        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Usuario eliminado correctamente');
    }
}
