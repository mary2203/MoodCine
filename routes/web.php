<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecommendationController;


//ruta para mostrar la pagina del moodcine 
Route::get('/', [RecommendationController::class, 'index']);

//ruta para recibir los datos del formulario de recomendacion y mostrar las recomendaciones de las peliculas
Route::post('/recomendar', [RecommendationController::class, 'recomendar']);

//ruta para mejecutar la funcion del controlador que muestra la pagina de recomendaciones
Route::get('/recomendaciones', [RecommendationController::class, 'verRecomendaciones']);


Route::get('/nosotros', function () {
    return view('nosotros');
});