<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use App\Models\Libro;
use App\Models\LibroOrden;
use Illuminate\Support\Facades\Auth;

class OrdenesController extends Controller
{
    
    public function index()
    {
        $ordenes = Auth::user()->ordenes()->with('libroOrden')->get();
        return view('ordenes.index', compact('ordenes'));
    }

    
    public function show($id)
    {
        $orden = Orden::with('libroOrden.libro')->findOrFail($id);
        return view('ordenes.show', compact('orden'));
    }
    
    
    public function checkout(Request $request)
    {
        $carrito = session()->get('carrito', []);

        if (!$carrito) {
            return redirect()->back()->with('error', 'Tu carrito está vacío.');
        }

        foreach ($carrito as $id => $details) {
            $libro = Libro::findOrFail($id);
            $libro->stock -= $details['cantidad'];
            $libro->save();
        }

        $orden = new Orden();
        $orden->user_id = Auth::id();
        $orden->total = array_reduce($carrito, function ($total, $item) {
            return $total + ($item['precio'] * $item['cantidad']);
        }, 0);
        $orden->save();

        foreach ($carrito as $id => $details) {
            $libroOrden = new LibroOrden();
            $libroOrden->orden_id = $orden->id;
            $libroOrden->libro_id = $id;
            $libroOrden->cantidad = $details['cantidad'];
            $libroOrden->save();
        }

        session()->forget('carrito');

        return redirect()->route('ordenes.show', $orden->id)->with('success', 'Compra procesada exitosamente.');

    }
}
