<?php

use Illuminate\Support\Facades\Route;

$peliculas = [
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

Route::get('/', function () use ($peliculas) {
    $peliculasMostradas = $peliculas;
    shuffle($peliculasMostradas);
    $peliculasMostradas = array_slice($peliculasMostradas, 0, 3);

    return view('moodcine', compact('peliculasMostradas'));
});

Route::get('/recomendaciones', function () use ($peliculas) {
    return view('recomendaciones', compact('peliculas'));
});

Route::get('/nosotros', function () {
    return view('nosotros');
});