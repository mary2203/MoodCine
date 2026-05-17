<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoodCine</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/moodcine.css?v=railway3">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark navbar-moodcine fixed-top">

        <div class="container">

            <a class="navbar-brand fw-bold" href="/">
                MoodCine
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarContenido"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContenido">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#features">
                            Características
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#tecnologias">
                            Tecnologías
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">
                            Nosotros
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Comenzar
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    {{-- hero --}}
    <section class="container py-5">

        <div class="hero-banner reveal">

            <div class="hero-banner-text">

                <h1 class="titulo-principal mb-4">
                    Encuentra películas perfectas para tu estado de ánimo
                </h1>

                <p class="subtitulo mb-5">
                    MoodCine utiliza Inteligencia Artificial para recomendar películas personalizadas
                    según cómo te sientes, tu género favorito y tu plataforma de streaming.
                </p>

                <a href="{{ route('login') }}" class="btn btn-moodcine btn-lg px-5 py-3">
                    Obtener recomendaciones
                </a>

            </div>

            <div class="hero-banner-images">

                @foreach ($heroImages as $image)

                    <img
                        src="{{ asset('images/hero/' . $image->getFilename()) }}"
                        alt="MoodCine"
                    >

                @endforeach

            </div>

        </div>

    </section>

    {{-- seccion de features --}}
    <section class="container py-5" id="features">

        <div class="text-center mb-5 reveal">

            <h2 class="titulo-seccion">
                ¿Cómo funciona?
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-md-4 reveal-left">

                <div class="card tarjeta-formulario h-100 text-center p-4">

                    <div class="card-body">

                        <h3 class="paso-numero">
                            01
                        </h3>

                        <h3 class="mb-3">
                            Describe tu mood
                        </h3>

                        <p>
                            Cuéntanos cómo te sientes y qué tipo de película quieres ver.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4 reveal">

                <div class="card tarjeta-formulario h-100 text-center p-4">

                    <div class="card-body">

                        <h3 class="paso-numero">
                            02
                        </h3>

                        <h3 class="mb-3">
                            IA Generativa
                        </h3>

                        <p>
                            MoodCine utiliza Groq AI para analizar emociones y generar recomendaciones.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4 reveal-right">

                <div class="card tarjeta-formulario h-100 text-center p-4">

                    <div class="card-body">

                        <h3 class="paso-numero">
                            03
                        </h3>

                        <h3 class="mb-3">
                            Recomendaciones
                        </h3>

                        <p>
                            Obtén películas con posters, géneros, descripción y plataformas.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- tecnologias --}}
    <section class="container py-5" id="tecnologias">

        <div class="text-center mb-5 reveal">

            <h2 class="titulo-seccion">
                Tecnologías utilizadas
            </h2>

        </div>

        <div class="tech-badges reveal">

            <span>Laravel</span>
            <span>AJAX</span>
            <span>Groq AI</span>
            <span>TMDb API</span>
            <span>Bootstrap</span>
            <span>JSON</span>
            <span>REST API</span>
            <span>PHP</span>

        </div>

    </section>

    {{-- nosotros --}}
    <section class="container py-5" id="nosotros">

        <div class="text-center mb-5 reveal">

            <h2 class="titulo-seccion">
                Nosotros
            </h2>

            <p class="subtitulo">
                MoodCine es una aplicación web desarrollada para recomendar películas según el estado de ánimo del usuario,
                su género favorito y la plataforma que utiliza.
            </p>

            <p class="subtitulo">
                Fue desarrollada por dos estudiantes: Walter Mijangos y María Pacheco, quienes utilizaron sus conocimientos
                de programación para traer este proyecto a la vida.
            </p>

        </div>

        <div class="row mt-5 justify-content-center g-4">

            <div class="col-md-4 text-center reveal-left">

                <div class="tarjeta-formulario p-4 h-100">

                    <img
                        src="{{ asset('images/team/maria.jpg') }}"
                        class="img-fluid rounded-circle mb-3"
                        style="width: 180px; height: 180px; object-fit: cover;"
                        alt="María Pacheco"
                    >

                    <h5>
                        María Pacheco
                    </h5>

                    <p class="mb-0 text-light">
                        Desarrolladora Frontend
                    </p>

                </div>

            </div>

            <div class="col-md-4 text-center reveal-right">

                <div class="tarjeta-formulario p-4 h-100">

                    <img
                        src="{{ asset('images/team/walter.jpg') }}"
                        class="img-fluid rounded-circle mb-3"
                        style="width: 180px; height: 180px; object-fit: cover;"
                        alt="Walter Mijangos"
                    >

                    <h5>
                        Walter Mijangos
                    </h5>

                    <p class="mb-0 text-light">
                        Desarrollador Backend
                    </p>

                </div>

            </div>

        </div>

    </section>

    {{-- footer --}}
    <footer class="text-center py-4 reveal">

        <p class="mb-0 text-light">
            MoodCine © 2026 — Proyecto Laravel con Inteligencia Artificial desarrollado por Walter Mijangos y María Pacheco.
        </p>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        function revealOnScroll() {

            const reveals = document.querySelectorAll(
                '.reveal, .reveal-left, .reveal-right'
            );

            reveals.forEach((element) => {

                const windowHeight = window.innerHeight;

                const elementTop = element.getBoundingClientRect().top;

                const visiblePoint = 120;

                if (elementTop < windowHeight - visiblePoint) {

                    element.classList.add('active');

                }

            });

        }

        window.addEventListener('scroll', revealOnScroll);

        window.addEventListener('load', revealOnScroll);

    </script>

</body>

</html>
