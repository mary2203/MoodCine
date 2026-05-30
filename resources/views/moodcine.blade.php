<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoodCine</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/moodcine.css?v=railway6">
</head>

<body class="moodcine-page">

<nav class="navbar navbar-dark navbar-moodcine">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            ← Volver a inicio
        </a>

        <button class="btn btn-moodcine" onclick="window.location.href='{{ url('/historial') }}'">
            Ver historial
        </button>

        @if (Auth::check())
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="btn btn-moodcine inline-flex items-center px-4 py-2 rounded-xl text-white font-semibold bg-gradient-to-br from-[#a82828] to-[#7a1414] hover:scale-105 transition duration-200 shadow-lg">
                        {{ Auth::user()->name }} <img src="{{Auth::user()->img}}" alt="Avatar" class="rounded-full w-8 h-8 ms-2"> ▾
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        Perfil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        @endif

    </div>
</nav>

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="titulo-principal">
            MoodCine
        </h1>

        <p class="subtitulo">
            Encuentra recomendaciones de películas según tu estado de ánimo y plataforma de streaming favorita.
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="tarjeta-formulario p-4">
                <form action="{{ url('/recomendar') }}" method="POST" id="formularioRecomendar">
                    @csrf

                    <div class="mb-3">
                        <label for="estado_animo" class="form-label">
                            ¿Cómo te sientes hoy?
                        </label>

                        <textarea
                            class="form-control"
                            id="estado_animo"
                            name="estado_animo"
                            rows="3"
                            placeholder="Ejemplo: Tuve un día pesado y quiero ver algo divertido..."
                        ></textarea>

                        @error('estado_animo')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="plataforma" class="form-label">
                            Plataforma
                        </label>

                        <select class="form-select" id="plataforma" name="plataforma">
                            <option value="" selected disabled>
                                Selecciona una plataforma
                            </option>
                            <option>Netflix</option>
                            <option>Max</option>
                            <option>Disney+</option>
                            <option>Prime Video</option>
                            <option>Hulu</option>
                        </select>

                        @error('plataforma')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
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

    <div class="mt-5">
        <h2 class="titulo-seccion text-center">
            Recomendaciones para ti
        </h2>

        <div class="row g-4" id="contenedorPeliculas">

            @foreach ($peliculasMostradas as $pelicula)
                <div class="col-md-4">
                    <div class="card tarjeta-pelicula h-100">

                        <img
                            src="{{ asset($pelicula['imagen']) }}"
                            alt="{{ $pelicula['titulo'] }}"
                            class="poster-pelicula"
                        >

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

        <div class="text-center mt-5 mb-5 recomendaciones-extra">
            <h3>
                ¿Ninguna te convence?
            </h3>

            <a href="{{ url('/recomendaciones') }}" class="btn btn-moodcine mt-3">
                Ver más recomendaciones
            </a>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleUserMenu() {
        const menu = document.getElementById('userMenuDropdown');
        menu.classList.toggle('show');
    }

    document.addEventListener('click', function (event) {
        const userMenu = document.querySelector('.user-menu');

        if (userMenu && !userMenu.contains(event.target)) {
            document.getElementById('userMenuDropdown')?.classList.remove('show');
        }
    });

    document.getElementById("formularioRecomendar").addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        let contenedor = document.getElementById("contenedorPeliculas");

        contenedor.innerHTML = `
            <div class="col-12 d-flex justify-content-center align-items-center" style="height: 200px;">
                <div class="spinner-border text-light" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        `;

        fetch("/recomendar", {
            method: "POST",
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => Promise.reject(err));
            }

            return response.json();
        })
        .then(data => {
            renderPeliculas(data);
        })
        .catch(error => {
            contenedor.innerHTML = `
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error al obtener las recomendaciones. Por favor, intenta nuevamente.
                    </div>
                </div>
            `;
        });
    });

    function renderPeliculas(peliculas) {
        let contenedor = document.getElementById("contenedorPeliculas");
        contenedor.innerHTML = "";

        if (!Array.isArray(peliculas) || peliculas.length === 0) {
            contenedor.innerHTML = `
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        No se encontraron recomendaciones para tu estado de ánimo y preferencias. Intenta con una descripción diferente o selecciona otra plataforma.
                    </div>
                </div>
            `;
            return;
        }

        peliculas.forEach(pelicula => {
            contenedor.innerHTML += `
                <div class="col-md-4">
                    <div class="card tarjeta-pelicula h-100">
                        <img
                            src="${pelicula.poster_url ?? '/images/default-poster.jpg'}"
                            class="poster-pelicula"
                            alt="${pelicula.titulo}"
                        >

                        <div class="card-body">
                            <h5>${pelicula.titulo}</h5>
                            <p>Año: ${pelicula.anio}</p>
                            <p><strong>Género:</strong> ${pelicula.genero}</p>
                            <p><strong>Mood:</strong> ${pelicula.mood}</p>
                            <p>${pelicula.descripcion}</p>
                        </div>
                    </div>
                </div>
            `;
        });
    }
</script>

</body>
</html>
