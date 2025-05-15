<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\EstudianteRegistroController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/registro-estudiante', function () {
    return Inertia::render('auth/RegisterEstudiante');
})->name('estudiantes.formulario');

Route::post('/registrar-estudiante', [EstudianteRegistroController::class, 'store'])->name('estudiantes.registrar');

Route::get('/api/dni/{dni}', [\App\Http\Controllers\DniController::class, 'buscar']);

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
