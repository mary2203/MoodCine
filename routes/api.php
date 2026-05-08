<?php

use Illuminate\Support\Facades\Route;
use App\Models\MovieRecommendation;

Route::get('/recommendations', function () {
    $recommendations = MovieRecommendation::latest()
        ->take(10)
        ->get();

    return response()->json([
        'success' => true,
        'message' => 'Recomendaciones obtenidas correctamente',
        'data' => $recommendations
    ]);
});