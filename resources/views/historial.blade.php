<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial - MoodCine</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/moodcine.css') }}">

</head>

<body class="moodcine-page">

<nav class="navbar navbar-dark navbar-moodcine">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand fw-bold" href="{{ url('/moodcine') }}">
            ← Volver a MoodCine
        </a>

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
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                    <x-dropdown-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        Cerrar sesión
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    @endif
</div>
</nav>
@php

    $seleccionado = request('historial');

    if (!$seleccionado && $historial->count()) {
        $seleccionado = $historial->first()->id;
    }

    $historialActivo = $historial->firstWhere('id', $seleccionado);

@endphp

<div class="container-fluid py-4">

    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-lg-3 mb-4">
            <div class="sidebar-historial">
                <h3 class="mb-4 titulo">
                    Historial
                </h3>
                @forelse($historial as $item)
                    <a
                        href="{{ route('historial', ['historial' => $item->id]) }}"
                        class="sidebar-link
                        {{ $seleccionado == $item->id ? 'active-sidebar' : '' }}"
                    >
                        <strong>
                            {{ Str::limit($item->estado_animo, 25) }}
                        </strong>
                        <br>
                        <small class="text-light">
                            {{ $item->created_at->format('d/m/Y H:i') }}
                        </small>
                    </a>
                @empty
                    <div class="alert alert-dark">
                        No hay historial todavía.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- CONTENIDO -->
        <div class="col-lg-9">
            <h1 class="titulo mb-5">
                Historial de recomendaciones
            </h1>
            @if($historialActivo)
                <div class="historial-card">

                    <!-- DATOS -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-light">
                                Estado de ánimo
                            </label>
                            <input
                                type="text"
                                class="form-control info-box"
                                value="{{ $historialActivo->estado_animo }}"
                                readonly
                            >
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-light">
                                Plataforma
                            </label>
                            <input
                                type="text"
                                class="form-control info-box"
                                value="{{ $historialActivo->plataforma }}"
                                readonly
                            >
                        </div>
                    </div>

                    <!-- PELICULAS -->
                    <div class="row">
                        @if(is_array($historialActivo->respuesta_ia))
                            @foreach($historialActivo->respuesta_ia as $pelicula)
                                <div class="col-md-4 mb-4">
                                    <div class="card tarjeta-pelicula h-100">
                                        <img
                                            src="{{ $pelicula['poster_url'] ?? asset('images/default-poster.jpg') }}"
                                            alt="Poster"
                                        >
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $pelicula['titulo'] ?? 'Sin título' }}
                                            </h5>
                                            <p class="card-text">
                                                {{ $pelicula['descripcion'] ?? '' }}
                                            </p>
                                            <div class="mt-3">
                                                <span class="badge bg-danger">
                                                    {{ $pelicula['genero'] ?? 'Sin género' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <div class="alert alert-warning">
                                    No se encontraron recomendaciones guardadas.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    No hay historial disponible.
                </div>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
