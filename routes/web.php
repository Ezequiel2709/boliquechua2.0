<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuechuaController;
use Illuminate\Support\Facades\Route;

// Redirige la raíz a login (o a categorías si ya está autenticado)
Route::get('/', function () {
    return auth()->check() ? redirect()->route('categorias') : redirect('/login');
});

// Las rutas protegidas (requieren login)
Route::middleware(['auth'])->group(function () {
    Route::get('/categorias', [QuechuaController::class, 'index'])->name('categorias');
    Route::get('/categoria/{id}/niveles', [QuechuaController::class, 'niveles'])->name('niveles');
    Route::get('/juego/{id}', [QuechuaController::class, 'juego'])->name('juego');
    Route::post('/guardar-progreso', [QuechuaController::class, 'guardarProgreso'])->name('guardar.progreso');
    Route::get('/check-vidas', [QuechuaController::class, 'checkVidas'])->name('check.vidas');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Después de login exitoso, redirigir a categorías
Route::get('/dashboard', function () {
    return redirect()->route('categorias');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';