<?php

namespace App\Http\Controllers;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{


    public function estudiantes(){

        $participantes = Estudiante::latest()->get();

        // puedes paginar si hay muchos
        return Inertia::render('Admin/Participantes', [
            'participantes' => $participantes,
        ]);
    }


}
