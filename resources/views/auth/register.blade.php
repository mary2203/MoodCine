<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <h1 class="auth-title">Crear cuenta</h1>

        <div class="auth-field">
            <label for="name">Nombre</label>

            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
            >

            <x-input-error :messages="$errors->get('name')" class="auth-error" />
        </div>

        <div class="auth-field">
            <label for="email">Correo electrónico</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
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
                autocomplete="new-password"
            >

            <x-input-error :messages="$errors->get('password')" class="auth-error" />
        </div>

        <div class="auth-field">
            <label for="password_confirmation">Confirmar contraseña</label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            >

            <x-input-error :messages="$errors->get('password_confirmation')" class="auth-error" />
        </div>

        <div class="auth-actions">
            <a href="{{ route('login') }}">
                ¿Ya tienes una cuenta?
            </a>

            <button type="submit" class="btn btn-moodcine">
                Registrarse
            </button>
        </div>
    </form>
</x-guest-layout>
