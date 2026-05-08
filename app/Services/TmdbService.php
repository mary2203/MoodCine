<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TmdbService
{
    public function obtenerPoster($titulo, $anio = null)
    {
        $apiKey = env('TMDB_API_KEY');

        if (!$apiKey) {
            return asset('images/default-poster.jpg');
        }

        $response = Http::get('https://api.themoviedb.org/3/search/movie', [
            'api_key' => $apiKey,
            'query' => $titulo,
            'year' => $anio,
            'language' => 'es-ES',
        ]);

        if (!$response->successful()) {
            return asset('images/default-poster.jpg');
        }

        $pelicula = $response->json('results.0');

        if (!$pelicula || empty($pelicula['poster_path'])) {
            return asset('images/default-poster.jpg');
        }

        return 'https://image.tmdb.org/t/p/w500' . $pelicula['poster_path'];
    }
}