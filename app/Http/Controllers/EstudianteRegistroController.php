<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Inertia\Inertia;

use function Termwind\render;

class EstudianteRegistroController extends Controller
{
    public function index(){
                return Inertia::render('participantes/Index', [
            'participantes' => Estudiante::all(),
        ]);
    }

        public function show(){
                return Inertia::render('auth/RegisterEstudiante');
    }

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

        Estudiante::create(array_merge($validated, [
            'estado' => 'inactivo',
        ]));

        return redirect()->route('estudiantes.formulario')->with('success', 'Gracias por participar en Audita 2025. Se le enviará sus credenciales a su correo.');
    }
}
