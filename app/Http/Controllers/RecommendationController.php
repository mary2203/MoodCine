<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MovieRecommendation;

use App\Http\Requests\StoreRecommendationRequest;

class RecommendationController extends Controller


{
    //Aqui contiene las peliculas estan estaticas y definidas dentro de un arreglo, donde cada pelicula esta para ver funciones de prueba y ver si funciona el sistema de recomendacion ya que las pelicula no se guardan en base de datos sino que lo unico que se guarda seria el estado de animo, genero y plataforma que el usuario selecciona
    private $peliculas=[
        [
        'titulo' => 'Anora',
        'anio' => '2024',
        'descripcion' => 'Una joven trabajadora sexual en Nueva York vive un romance inesperado con el hijo de un oligarca ruso, lo que desencadena consecuencias intensas y caóticas.',
        'imagen' => 'images/posters/AnoraPoster.jpg',
        'genero' => 'Drama',
        'mood' => 'Intenso, caótico',
    ],
    [
        'titulo' => 'Call Me By Your Name',
        'anio' => '2017',
        'descripcion' => 'Durante un verano en Italia, un adolescente experimenta su primer amor con un visitante mayor, en una historia delicada sobre deseo, identidad y crecimiento.',
        'imagen' => 'images/posters/CMBYNPoster.jpg',
        'genero' => 'Romance, Drama',
        'mood' => 'Nostálgico, emocional',
    ],
    [
        'titulo' => 'F1',
        'anio' => '2025',
        'descripcion' => 'Un piloto veterano regresa a la Fórmula 1 para competir junto a una nueva generación, enfrentando presión, velocidad y rivalidades dentro y fuera de la pista.',
        'imagen' => 'images/posters/F1Poster.jpg',
        'genero' => 'Acción, Deportes',
        'mood' => 'Adrenalina, motivador',
    ],
    [
        'titulo' => 'Helter Skelter',
        'anio' => '2012',
        'descripcion' => 'Una supermodelo obsesionada con la perfección física enfrenta las consecuencias psicológicas de sus cirugías y la presión de la fama.',
        'imagen' => 'images/posters/HelterSkelterPoster.jpg',
        'genero' => 'Drama psicológico',
        'mood' => 'Oscuro, perturbador',
    ],
    [
        'titulo' => 'Star Wars: Episodio III',
        'anio' => '2005',
        'descripcion' => 'Anakin Skywalker cae al lado oscuro mientras la República se transforma en el Imperio, marcando el nacimiento de Darth Vader.',
        'imagen' => 'images/posters/StarWarsIIIPoster.jpg',
        'genero' => 'Ciencia ficción, Acción',
        'mood' => 'Épico, trágico',
    ],
    [
        'titulo' => 'Suspiria',
        'anio' => '2018',
        'descripcion' => 'Una joven bailarina se une a una academia de danza en Berlín, donde descubre secretos oscuros y sobrenaturales.',
        'imagen' => 'images/posters/SuspiriaPoster.jpg',
        'genero' => 'Terror, Drama',
        'mood' => 'Tenso, inquietante',
    ],
    [
        'titulo' => 'The Godfather',
        'anio' => '1972',
        'descripcion' => 'La historia de la familia Corleone y la transformación de Michael en el líder de una poderosa organización criminal.',
        'imagen' => 'images/posters/TheGodfatherPoster.jpg',
        'genero' => 'Crimen, Drama',
        'mood' => 'Serio, intenso',
    ],
    ];

    //esta funcion sirve para mostrar el formulario de recomendacion y mostrar las peliculas de forma aleatoria cada que se recargue la pagina
    public function index()
    {
        //aqui muestra las peliculas para que sean aleatorias
        $peliculasMostradas = $this->peliculas;
        shuffle($peliculasMostradas);
        $peliculasMostradas = array_slice($peliculasMostradas, 0, 5);
        
        return view('moodcine', compact('peliculasMostradas'));
    }

    //esta funcion es para recibir los datos del formulario de recomendacion
    public function recomendar(StoreRecommendationRequest $request)
    {
        //Aqui se guarda las entradas del formulario
        MovieRecommendation::create([
            'estado_animo'=>$request->estado_animo,
            'genero'=>$request->genero,
            'plataforma'=>$request->plataforma
        ]);

        //aqui muestra las peliculas para que sean aleatorias
        $peliculasMostradas = $this->peliculas;
        shuffle($peliculasMostradas);
        $peliculasMostradas = array_slice($peliculasMostradas, 0, 5);
        
        return view('moodcine', compact('peliculasMostradas'));
    }

    //funcion para mostrar la pagina de recomendaciones de donde se muestran todas las recomendaciones de las peliculas que se encuentran disponibles
    public function verRecomendaciones()
    {
        return view('recomendaciones', ['peliculas'=>$this->peliculas]);
    }
}
