<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class EstudianteRegistroController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|unique:estudiantes,dni',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|unique:estudiantes,correo',
            'institucion' => 'required|string|max:255',
            'tipo' => 'required|in:pleno,observador,estudiante',
            'codigo_operacion' => 'required|string|unique:estudiantes,codigo_operacion',
            'voucher_pago' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('voucher_pago')) {
            $validated['voucher_pago'] = $request->file('voucher_pago')->store('vouchers', 'public');
        }

        Estudiante::create($validated);

        return redirect()->back()->with('success', 'Tu solicitud ha sido enviada. Espera la aprobación del administrador.');
    }
}
