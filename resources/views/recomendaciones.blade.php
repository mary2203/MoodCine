<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas - MoodCine</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/moodcine.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-moodcine">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">MoodCine</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMoodCine" aria-controls="navbarMoodCine" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMoodCine">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/recomendaciones') }}">Recomendaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/nosotros') }}">Nosotros</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="titulo-principal">Películas</h1>
        <p class="subtitulo">
            Esta es una selección de películas altamente recomendadas, incluye su trama, género y el mood que invoca
        </p>
    </div>

    <div class="row g-4">
        @foreach ($peliculas as $pelicula)
            <div class="col-md-6 col-lg-4">
                <div class="card tarjeta-pelicula h-100">
                    <img src="{{ asset($pelicula['imagen']) }}"
                         alt="{{ $pelicula['titulo'] }}"
                         class="poster-pelicula">

                    <div class="card-body">
                        <h5 class="card-title">{{ $pelicula['titulo'] }}</h5>

                        <p class="anio-pelicula">
                            Año: {{ $pelicula['anio'] }}
                        </p>

                        <p class="genero-pelicula">
                            <strong>Género:</strong> {{ $pelicula['genero'] }}
                        </p>

                        <p class="mood-pelicula">
                            <strong>Mood:</strong> {{ $pelicula['mood'] }}
                        </p>

                        <p class="card-text">
                            {{ $pelicula['descripcion'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>