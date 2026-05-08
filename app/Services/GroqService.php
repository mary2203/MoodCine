<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroqService
{
    public function recomendarPeliculas($estado, $genero, $plataforma)
    {
        $apiKey = env('GROQ_API_KEY');

        $prompt = "
        Recomienda un top 5 de películas según estos datos:

        Estado de ánimo: {$estado}
        Género favorito: {$genero}
        Plataforma: {$plataforma}

        Responde únicamente con un arreglo JSON válido.
        No incluyas texto adicional, no uses markdown, no uses ```json.

        Formato exacto:
        [
            {
                \"titulo\": \"Nombre de la película\",
                \"anio\": \"2020\",
                \"descripcion\": \"Breve justificación de por qué encaja con el estado de ánimo del usuario.\",
                \"genero\": \"Comedia\",
                \"mood\": \"divertido y relajante\",
                \"plataforma\": \"Netflix\"
            }
        ]
        ";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json'
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama-3.3-70b-versatile',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt
                ]
            ]
        ]);

        $resultado = $response->json();

        $texto = $resultado['choices'][0]['message']['content'] ?? '[]';

        $peliculas = json_decode($texto, true);

        if (!is_array($peliculas)) {
            return [];
        }

        $tmdb = new TmdbService();

        foreach ($peliculas as &$pelicula) {
            $pelicula['poster_url'] = $tmdb->obtenerPoster(
                $pelicula['titulo'] ?? '',
                $pelicula['anio'] ?? null
            );
        }

        return $peliculas;
    }
}