<?php

use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\AdminController;
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



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/participantes', [EstudianteRegistroController::class, 'index'])->name('participantes.index');
    Route::post('/participantes', [EstudianteRegistroController::class, 'store'])->name('participantes.store');
});


Route::get('/registro-estudiante', [EstudianteRegistroController::class, 'show'])->name('estudiantes.formulario');
Route::post('/registro-estudiante', [EstudianteRegistroController::class, 'store'])->name('estudiantes.registrar');


Route::get('/api/dni/{dni}', [\App\Http\Controllers\DniController::class, 'buscar']);

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
