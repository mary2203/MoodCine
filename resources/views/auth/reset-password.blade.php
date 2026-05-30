<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="auth-form">
        @csrf

        <h1 class="auth-title">Restablecer contraseña</h1>

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="auth-field">
            <label for="email">Correo electrónico</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email', $request->email) }}"
                required
                autofocus
                autocomplete="username"
            >

            <x-input-error :messages="$errors->get('email')" class="auth-error" />
        </div>

        <div class="auth-field">
            <label for="password">Nueva contraseña</label>

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

        <div class="auth-actions auth-actions-end">
            <button type="submit" class="btn btn-moodcine">
                Restablecer
            </button>
        </div>
    </form>
</x-guest-layout>
