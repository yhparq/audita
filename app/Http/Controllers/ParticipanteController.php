<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('participantes/Index', [
            'participantes' => Participante::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('participantes/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:participantes,dni',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|unique:participantes,correo',
            'institucion' => 'required|string|max:255',
            'tipo' => 'required|in:pleno,observador,estudiante',
            'codigo_operacion' => 'required|string|max:100|unique:participantes,codigo_operacion',
            'voucher_pago' => 'nullable|image|max:2048', // max 2MB
            'departamento' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'distrito' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
        ]);

        // Manejar el archivo si viene
        if ($request->hasFile('voucher_pago')) {
            $validated['voucher_pago'] = $request->file('voucher_pago')->store('vouchers', 'public');
        }

        // Se crea automáticamente con estado = 'inactivo' por defecto según la migración
        Participante::create($validated);

        return redirect()->route('participantes.index')->with('success', 'Participante creado correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Participante $participante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Participante $participante)
    {
        return Inertia::render('participantes/Edit', [
            'participante' => $participante,
        ]);
    }

    public function update(Request $request, Participante $participante)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:participantes,dni,' . $participante->id,
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|unique:participantes,correo,' . $participante->id,
            'institucion' => 'required|string|max:255',
            'tipo' => 'required|in:pleno,observador,estudiante',
            'codigo_operacion' => 'required|string|max:100|unique:participantes,codigo_operacion,' . $participante->id,
            'voucher_pago' => 'nullable|image|max:2048',
            'departamento' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'distrito' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
        ]);

        // Si suben nueva imagen, eliminar la anterior
        if ($request->hasFile('voucher_pago')) {
            if ($participante->voucher_pago && Storage::disk('public')->exists($participante->voucher_pago)) {
                Storage::disk('public')->delete($participante->voucher_pago);
            }

            $validated['voucher_pago'] = $request->file('voucher_pago')->store('vouchers', 'public');
        }

        $participante->update($validated);

        return redirect()->route('participantes.index')->with('success', 'Participante actualizado correctamente.');
    }

    public function destroy(Participante $participante)
    {
        if ($participante->voucher_pago && Storage::disk('public')->exists($participante->voucher_pago)) {
            Storage::disk('public')->delete($participante->voucher_pago);
        }

        $participante->delete();

        return redirect()->route('participantes.index')->with('success', 'Participante eliminado correctamente.');
    }
}
