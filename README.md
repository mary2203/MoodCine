<p align="center">
  <img src="docs/moodcine-banner.jpg" alt="MoodCine Banner" width="900">
</p>

Esta es una aplicación web desarrollada con Laravel que recomienda películas según el estado de ánimo del usuario y la plataforma de streaming seleccionada, el sistema utiliza inteligencia artificial para generar recomendaciones personalizadas y complementa los resultados con información obtenida desde TMDB.

---

## Características

- Registro e inicio de sesión de usuarios.
- Perfil de usuario.
- Recuperación de contraseña.
- Recomendaciones personalizadas según estado de ánimo.
- Integración con inteligencia artificial (Groq).
- Integración con TMDB para obtener información de películas.
- Diseño responsivo y personalizado.
- Despliegue en Railway.

---

## Tecnologías Utilizadas

### Backend
- Laravel 12
- PHP 8.2
### Frontend
- Blade
- Bootstrap 5
- CSS Personalizado
- JavaScript
### APIs
- Groq API
- TMDB API
### Base de Datos
- SQLite
### Control de Versiones
- Git
- GitHub
### Despliegue
- Railway

---

## Pasos para Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/USUARIO/MoodCine.git
```

### 2. Entrar al proyecto

```bash
cd MoodCine
```

### 3. Instalar dependencias

```bash
composer install
npm install
```

### 4. Configurar variables de entorno

Copiar:

```bash
cp .env.example .env
```

Generar clave:

```bash
php artisan key:generate
```

---

## Variables de Entorno

Configurar las siguientes variables:

```env
GROQ_API_KEY=
TMDB_API_KEY=
```

---

## Base de Datos

Ejecutar migraciones:

```bash
php artisan migrate
```

---

## Ejecutar el Proyecto

Iniciar Laravel:

```bash
php artisan serve
```

En otra terminal:

```bash
npm run dev
```

---

## Integrantes

- Walter Mijangos
- María Pacheco

