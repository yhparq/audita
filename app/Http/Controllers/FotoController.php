<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;


class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos = Foto::latest()->get();
        return Inertia::render('Admin/GaleriaFotos', ['fotos' => $fotos]);
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
        $request->validate([
            'foto' => 'required|image|max:2048',
            'titulo' => 'nullable|string|max:255',
        ]);

        $path = $request->file('foto')->store('galeria', 'public');

        Foto::create([
            'titulo' => $request->titulo,
            'ruta' => $path,
        ]);

        return redirect()->route('fotos.index')->with('success', 'Foto subida correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $fotos = Foto::latest()->get();
        return Inertia::render('Landing/Galeria', ['fotos' => $fotos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        //
    }
}
