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

                <form action="{{url('/recomendar')}}" method="POST" id="formularioRecomendar">
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

        <div class="row g-4" id="contenedorPeliculas">

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

<script>
    //este evento se encarga de escuchar el submit del formulario para obtener las recomendaciones, cuando se envia el formulario se previene la accion por defecto para evitar que se recargue la pagina y se obtiene los datos del formulario para enviarlos al backend y obtener las recomendaciones de las peliculas
    document.getElementById("formularioRecomendar").addEventListener("submit", function(e){
        e.preventDefault();

        //se obtiene los datos del formulario para enviarlos al backend y obtener las recomendaciones de las peliculas
        let formData = new FormData(this);
        
        //se declara el contenedor donde se van a mostrar las peliculas recomendadas
        let contenedor = document.getElementById("contenedorPeliculas");
        
        //este contenedor es el que va a tener el icono de carga mientras se obtienen las recomendaciones
        contenedor.innerHTML = `
            <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                <div class="spinner-border text-moodcine" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        `;

        //este fetch se encarga de enviar los datos del formulario para obtener las recomendaciones de las peliculas, se envia un POST a recomendar con los datos y se le incluyo el token de seguridad para evitar ataques CSRF y el backend se encarga de procesar los datos
        fetch("/recomendar", {
            method: "POST",
            body: formData,
            headers: {
                //este token se incluye en un header para que le backend verifique y permita procesar la solicitud y tambien es una medida de seguridad para evitar ataques.
                'X-CSRF-TOKEN': '{{csrf_token()}}',
                'Accept': 'application/json'
            }
        })
        //este then se va a encargar de verificar si la respuesta es exitosa o si ocurrio algun error que impida obtener las recomendaciones, en caso de error se lanza una excepción para que el siguiente catch se encargue de mostrar el mensaje de error al usuario
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => Promise.reject(err));//aqui se le cambio el throw err por el promise.reject(err) para que el error se maneje en el siguiente catch y se muestre el mensaje de error al usuario en el contenedor de recomendaciones.
            }
            return response.json();
        })
        //este then se va a encargar de renderizar las peliculas recomendadas en el contenedor cuando se obtengan los datos correctamente
        .then(data => {
            renderPeliculas(data);
        })
        //este catch es el que se encarga de mostrar el mensaje de erroe en el contenedor 
        .catch(error => {
            //se declara el contenedor donde se van a mostrar las peliculas recomendadas
            let contenedor = document.getElementById("contenedorPeliculas");

            //este contenedor es el que va a mostrar el mensaje de error si ocurre para obtener las recomendaciones
            contenedor.innerHTML =`
                <div class="alert alert-danger" role="alert">
                    Ocurrió un error al obtener las recomendaciones. Por favor, intenta nuevamente.
                </div>
            `;
        });
    });

    //esta funcion es para renderizar las peliculas en el contenedor
    function renderPeliculas(peliculas){
        let contenedor = document.getElementById("contenedorPeliculas");
        contenedor.innerHTML = "";

        //para mostrar si no se encontraron las recomendaciones, que verifica si esta valido el array y si no tiene peliculas muestra el mensaje de error
        if (!Array.isArray(peliculas) || peliculas.length===0){
            contenedor.innerHTML = `
                <div class="alert alert-info" role="alert">
                    No se encontraron recomendaciones para tu estado de ánimo y preferencias. Intenta con una descripción diferente o selecciona otros géneros y plataformas.
                </div>
            `;
            return;
        }

        //este codigo se envcarga de recorrer el array de peliculas que va a renderizar y por cada pelicula va a crear una tarjeta con la informacion de la pelicula y la va a agregar al contenedor para mostrarla
        peliculas.forEach(pelicula => {
            contenedor.innerHTML += `
                <div class="col-md-4">
                    <div class="card tarjeta-pelicula h-100">
                        <img src="/${pelicula.imagen}" class="poster-pelicula">
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