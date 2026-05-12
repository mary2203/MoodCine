<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\RecommendationController;

Route::get('/', function () {

    $heroImages = File::files(public_path('images/hero'));

    return view('welcome', compact('heroImages'));

});

Route::get('/moodcine', [RecommendationController::class, 'index']);

//ruta para recibir los datos del formulario
Route::post('/recomendar', [RecommendationController::class, 'recomendar']);

//ruta para mostrar recomendaciones
Route::get('/recomendaciones', [RecommendationController::class, 'verRecomendaciones']);

Route::get('/nosotros', function () {
    return view('nosotros');
});