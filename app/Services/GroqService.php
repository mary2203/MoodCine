<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroqService
{
    public function recomendarPeliculas($estado,$genero,$plataforma)
    {
        //aqui se obtiene la clave de la api desde el env. 
        $apiKey = env('GROQ_API_KEY');

        //aqui se crea el prompt para enviar a la api de groq donde se especifica el formato de respuesta y lo que se incluye en el prompt los datos que el usuario vaya a ingresar en el formulario para que la api genere las recomendaciones
        $prompt = "
        Recomienda top 5 peliculas.

        Estado de animo: $estado
        Género de pelicula: $genero
        plataforma: $plataforma

        Responde solo con un arreglo JSON válido
        
        Ejemplo:
        [
            {
                \"titulo\": \"Harry Potter y las reliquias de la muerte parte 2\",
                \"anio\": \"2011\",
                \"descripcion\": \"La batalla entre las fuerzas del bien y del mal del mundo mágico se convierte en una guerra a la que nadie es ajeno. Harry Potter tendrá que hacer un último sacrificio para destruir al malvado Voldemort\",
                \"genero\": \"Fantasía, aventuras y acción\",
                \"mood\": \"épico, oscuro, intenso y emocional\"
                \"plataforma\": \"Max\",
            }
        ]
        ";

        //aqui se hace la llamada a la api de groq para obtener las recomendaciones de peliculas basadas en el estado de animo, genero y plataforma que el usuario selecciono en el formulario, y luego devuelve la respuesta en formato json para que el frontend pueda procesarla y mostrarla en el contenedor de recomendaciones.
        $response = Http::withHeaders ([
            'Authorization' => 'Bearer ' . $apiKey, //este sirve para la autenticacion con la api para acceder a los servicios de groq
            'Content-Type' => 'aplication/json' //esto sirve para indicar que se esta enviando un json
        ])->post('https://api.groq.com/openai/v1/chat/completions', [

            "model" => "llama-3.3-70b-versatile",//el modelo que se va a usar

            "messages" => [
                [
                    "role"=>"user",
                    "content" => $prompt
                ]
            ]

        ]);

        $resultado = $response->json();

        //aqui se obtiene el texto de la respuesta de la api, si no se encuentra el campo choices o message o content se asigna un arreglo vacio para evitar errores
        $texto = $resultado['choices'][0]['message']['content'] ?? '[]';



        //convierte el texto a un arreglo de PHP para procesalo
        return json_decode($texto, true);
    }
}