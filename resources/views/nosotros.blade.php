<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - MoodCine</title>
    
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

<div class="container py-5 text-center">
    <h1 class="titulo-principal">Nosotros</h1>
    <p class="subtitulo">
        MoodCine es una aplicación web desarrollada para recomendar películas según el estado de ánimo del usuario, su género favorito y la plataforma que utiliza.
    </p>
    <p>

    </p>
    <p class="subtitulo">
        Fue desarrollada por dos estudiantes: Walter Mijangos y María Pacheco, quienes utilizaron sus conocimientos de programación para traer este proyecto a la vida.
    </p>
</div>

<div class="row mt-5 justify-content-center">

    <div class="col-md-4 text-center">
        <img src="{{ asset('images/team/maria.jpg') }}"
             class="img-fluid rounded-circle mb-3"
             style="width: 180px; height: 180px; object-fit: cover;">

        <h5>María Pacheco</h5>
        <p class="text-muted">Desarrolladora Frontend</p>
    </div>

    <div class="col-md-4 text-center">
        <img src="{{ asset('images/team/walter.jpg') }}"
             class="img-fluid rounded-circle mb-3"
             style="width: 180px; height: 180px; object-fit: cover;">

        <h5>Walter Mijangos</h5>
        <p class="text-muted">Desarrollador Backend</p>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>