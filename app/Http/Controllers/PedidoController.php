<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
        ]);

        $pedido = new Pedido();
        $pedido->user_id = Auth::id();
        $pedido->titulo = $request->titulo;
        $pedido->autor = $request->autor;
        $pedido->save();

        return redirect()->route('home')->with('success', 'Pedido enviado correctamente.');
    }


    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }
    public function destroy(Pedido $pedido)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('pedidos.index')->with('error', 'No tienes permisos para eliminar pedidos.');
        }
    
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado correctamente.');
    }
}
