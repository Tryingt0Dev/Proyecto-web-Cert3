<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class CarritoController extends Controller
{
    public function show(){
        $carrito = session()->get('carrito');
        $total = 0;

        foreach($carrito as $id => $details) {
            $total += $details['cantidad'] * $details['precio'];
        }

        return view('carrito.show', compact('carrito', 'total'));
    }


    
    public function add(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                "titulo" => $libro->titulo,
                "cantidad" => 1,
                "precio" => $libro->precio, 
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->back()->with('success', 'Libro agregado al carrito!');
    }

    
    public function remove(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Libro eliminado del carrito!');
    }

    
    public function update(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);
        $carrito[$id]['cantidad'] = $request->cantidad;

        session()->put('carrito', $carrito);
        return redirect()->back()->with('success', 'Cantidad actualizada!');
    }
}
