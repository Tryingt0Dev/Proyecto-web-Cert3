<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'),);
    }

    public function agregar()
    {
        return view('libros.agregar');
    }

    public function store(Request $request){
    $validated = $request->validate([
        'titulo' => 'required',
        'autor' => 'required',
        'stock' => 'required|integer|min:0',
        'descripcion' => 'required',
        'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'precio' => 'required|numeric|min:1', 
    ]);

    if ($request->hasFile('imagen')) {
        $imagenPath = $request->file('imagen')->store('public/imagenes');
        $validated['imagen'] = $imagenPath;
    }

    Libro::create($validated);

    return redirect()->route('libros.index')->with('success', 'Libro creado correctamente');
    }

    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, $id){
    $validated = $request->validate([
        'titulo' => 'required',
        'autor' => 'required',
        'stock' => 'required|integer|min:0',
        'descripcion' => 'required',
        'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'precio' => 'required|numeric|min:1', 
    ]);

    $libro = Libro::findOrFail($id);

    if ($request->hasFile('imagen')) {
        
        Storage::delete($libro->imagen);

        
        $imagenPath = $request->file('imagen')->store('public/imagenes');
        $validated['imagen'] = $imagenPath;
    
        }
        $libro->update($validated);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente');
    }

    public function destroy($id){
        $libro = Libro::findOrFail($id);
        $libro->stock = 0;
        $libro->save();

        return redirect()->route('libros.index')->with('success', 'Libro marcado como sin stock');
    }
}
