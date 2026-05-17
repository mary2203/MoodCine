<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\RecommendationController;

Route::get('/', function () {
    
    $heroImages = File::files(public_path('images/hero'));

    return view('welcome', compact('heroImages'));

});

Route::get('/moodcine', [RecommendationController::class, 'index'])
    ->middleware(['auth'])
    ->name('moodcine');

//ruta para recibir los datos del formulario
Route::post('/recomendar', [RecommendationController::class, 'recomendar'])
    ->middleware(['auth']);

//ruta para mostrar recomendaciones
Route::get('/recomendaciones', [RecommendationController::class, 'verRecomendaciones'])
    ->middleware(['auth']);

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/dashboard', function () {
    return redirect('/moodcine');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
