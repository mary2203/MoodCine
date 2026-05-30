<x-guest-layout>
    <form method="POST" action="{{ route('password.email') }}" class="auth-form">
        @csrf

        <h1 class="auth-title">Recuperar contraseña</h1>

        <p class="auth-text">
            ¿Olvidaste tu contraseña? No te preocupes. Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.
        </p>

        <x-auth-session-status class="auth-status" :status="session('status')" />

        <div class="auth-field">
            <label for="email">Correo electrónico</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
            >

            <x-input-error :messages="$errors->get('email')" class="auth-error" />
        </div>

        <div class="auth-actions auth-actions-end">
            <button type="submit" class="btn btn-moodcine">
                Enviar enlace
            </button>
        </div>
    </form>
</x-guest-layout>
