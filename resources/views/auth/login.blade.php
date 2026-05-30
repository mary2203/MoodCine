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

            <x-primary-button class="ms-3">
                {{ __('Iniciar sesión') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-center mt-4">
    
            <a href="{{ route('google.login') }}"
            class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 transition">

                <img src="https://logopng.com.br/logos/google-37.png"
                    alt="Google"
                    class="google-login-icon">

                <span class="text-sm text-gray-700">
                    Iniciar sesión con Google
                </span>

            </a>

        </div>
        <div>
            <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __("¿No tienes una cuenta?") }}
                <a href="{{ route('register') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Regístrate') }}
                </a>
            </p>
        </div>

        <p class="auth-footer-text">
            ¿No tienes una cuenta?
            <a href="{{ route('register') }}">Regístrate</a>
        </p>
    </form>
</x-guest-layout>
