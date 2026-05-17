<x-guest-layout>
    <form method="POST" action="{{ route('password.confirm') }}" class="auth-form">
        @csrf

        <h1 class="auth-title">Confirmar contraseña</h1>

        <p class="auth-text">
            Esta es un área segura. Confirma tu contraseña antes de continuar.
        </p>

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

        <div class="auth-actions auth-actions-end">
            <button type="submit" class="btn btn-moodcine">
                Confirmar
            </button>
        </div>
    </form>
</x-guest-layout>
