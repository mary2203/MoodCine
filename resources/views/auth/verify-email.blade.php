<x-guest-layout>
    <div class="auth-form">
        <h1 class="auth-title">Verificar correo</h1>

        <p class="auth-text">
            Gracias por registrarte. Antes de comenzar, verifica tu correo electrónico usando el enlace que te enviamos.
            Si no lo recibiste, podemos enviarte otro.
        </p>

        @if (session('status') == 'verification-link-sent')
            <p class="auth-status">
                Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
            </p>
        @endif

        <div class="auth-actions">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <button type="submit" class="btn btn-moodcine">
                    Reenviar correo
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="auth-link-button">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
