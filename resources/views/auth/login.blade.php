<x-guest-layout>
    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <h1 class="auth-title">Iniciar sesión</h1>

        <div class="auth-field">
            <label for="email">Correo electrónico</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
            >

            <x-input-error :messages="$errors->get('email')" class="auth-error" />
        </div>

        <div class="auth-field">
            <label for="password">Contraseña</label>

            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            >

            <x-input-error :messages="$errors->get('password')" class="auth-error" />
        </div>

        <div class="auth-remember">
            <input id="remember_me" type="checkbox" name="remember">

            <label for="remember_me">
                Recordarme
            </label>
        </div>

        <div class="auth-actions">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif

            <button type="submit" class="btn btn-moodcine">
                Iniciar sesión
            </button>
        </div>

        <p class="auth-footer-text">
            ¿No tienes una cuenta?
            <a href="{{ route('register') }}">Regístrate</a>
        </p>
    </form>
</x-guest-layout>
