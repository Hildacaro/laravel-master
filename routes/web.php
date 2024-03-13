<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\PrensaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PreguntaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/beneficiario', [BeneficiarioController::class, 'store'])->name('beneficiario.store');

Route::patch('/beneficiario/{id}', [BeneficiarioController::class, 'update'])->name('beneficiario.update');

Route::get('/beneficiario', [BeneficiarioController::class, 'index'])->name('beneficiario');

Route::get('/beneficiario/create', [BeneficiarioController::class, 'create'])->name('beneficiario.create');

Route::get('/beneficiario/{id}/edit', [BeneficiarioController::class, 'edit'])->name('beneficiario.edit');

Route::get('/beneficiario/{id}/show', [BeneficiarioController::class, 'show'])->name('beneficiario.show');

Route::delete('/beneficiario/{id}/delete', [BeneficiarioController::class, 'destroy'])->name('beneficiario.destroy');

Route::get('/prensa', [PrensaController::class, 'index'])->name('prensa');

Route::post('/prensa/store', [PrensaController::class, 'store'])->name('prensa.store');

Route::patch('/prensa/{id}/update', [PrensaController::class, 'update'])->name('prensa.update');

Route::get('/prensa/create', [PrensaController::class, 'create'])->name('prensa.create');

Route::get('/prensa/{id}/show', [PrensaController::class, 'show'])->name('prensa.show');

Route::get('/prensa/{id}/edit', [PrensaController::class, 'edit'])->name('prensa.edit');

Route::delete('/prensa/{id}/delete', [PrensaController::class, 'destroy'])->name('prensa.destroy');

Route::get('/equipo', [EquipoController::class, 'index'])->name('equipo');

Route::post('/equipo/store', [EquipoController::class, 'store'])->name('equipo.store');

Route::patch('/equipo/{id}/update', [EquipoController::class, 'update'])->name('equipo.update');

Route::get('/equipo/create', [EquipoController::class, 'create'])->name('equipo.create');

Route::get('/equipo/{id}/show', [EquipoController::class, 'show'])->name('equipo.show');

Route::get('/equipo/{id}/edit', [EquipoController::class, 'edit'])->name('equipo.edit');

Route::delete('/equipo/{id}/delete', [EquipoController::class, 'destroy'])->name('equipo.destroy');

Route::get('/pregunta', [PreguntaController::class, 'index'])->name('pregunta');

Route::post('/pregunta/store', [PreguntaController::class, 'store'])->name('pregunta.store');

Route::patch('/pregunta/{id}/update', [PreguntaController::class, 'update'])->name('pregunta.update');

Route::get('/pregunta/create', [PreguntaController::class, 'create'])->name('pregunta.create');

Route::get('/pregunta/{id}/show', [PreguntaController::class, 'show'])->name('pregunta.show');

Route::get('/pregunta/{id}/edit', [PreguntaController::class, 'edit'])->name('pregunta.edit');

Route::delete('/pregunta/{id}/delete', [PreguntaController::class, 'destroy'])->name('pregunta.destroy');

require __DIR__.'/auth.php';
