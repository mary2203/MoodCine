<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoodCine</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/moodcine.css?v=railway6">
</head>

<body class="auth-page">
    <main class="auth-layout">
        <a href="/">
            <img src="/images/moodcine-logo.png" alt="MoodCine" class="auth-logo">
        </a>

        <div class="auth-card">
            {{ $slot }}
        </div>
    </main>
</body>
</html>
