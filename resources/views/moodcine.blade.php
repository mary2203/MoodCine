<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoodCine</title>

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

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h1 class="titulo-principal">MoodCine</h1>
        <p class="subtitulo">
            ¡Encuentra recomendaciones de películas según tu estado de ánimo, género favorito y plataforma de streaming!
        </p>
    </div>

    <!-- FORMULARIO -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="tarjeta-formulario p-4">

                <form action="{{url('/recomendar')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="estado_animo" class="form-label">¿Cómo te sientes hoy?</label>
                        <textarea class="form-control" id="estado_animo" name="estado_animo" rows="3"
                            placeholder="Ejemplo: Tuve un día pesado y quiero ver algo divertido..."></textarea>
                             <!--alerta de error para el titulo-->
                            @error('estado_animo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label for="genero" class="form-label">Género favorito</label>
                        <select class="form-select" id="genero" name="genero">
                            <option selected disabled>Selecciona un género</option>
                            <option>Comedia</option>
                            <option>Drama</option>
                            <option>Acción</option>
                            <option>Romance</option>
                            <option>Terror</option>
                            <option>Suspenso</option>
                            <option>Ciencia ficción</option>
                            <option>Animación</option>
                        </select>
                        @error('genero')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="plataforma" class="form-label">Plataforma</label>
                        <select class="form-select" id="plataforma" name="plataforma">
                            <option selected disabled>Selecciona una plataforma</option>
                            <option>Netflix</option>
                            <option>Max</option>
                            <option>Disney+</option>
                            <option>Prime Video</option>
                            <option>Hulu</option>
                        </select>
                        @error('plataforma')
                                <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-moodcine">
                            Recomendar películas
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- RESULTADOS -->
    <div class="mt-5">
        <h2 class="text-center mb-4 titulo-seccion">Recomendaciones para ti</h2>

        <div class="row g-4">

            @foreach ($peliculasMostradas as $pelicula)
                <div class="col-md-4">

                    <div class="card tarjeta-pelicula h-100">

                        <img src="{{ asset($pelicula['imagen']) }}"
                             alt="{{ $pelicula['titulo'] }}"
                             class="poster-pelicula">

                        <div class="card-body">

                            <h5 class="card-title">
                                {{ $pelicula['titulo'] }}
                            </h5>

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

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>