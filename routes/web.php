<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\RecommendationController;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    
    $heroImages = File::files(public_path('images/hero'));

    return view('welcome', compact('heroImages'));

});

Route::get('/moodcine', [RecommendationController::class, 'index'])
    ->middleware(['auth'])
    ->name('moodcine');

//ruta para recibir los datos del formulario
Route::post('/recomendar', [RecommendationController::class, 'recomendar'])
    ->middleware(['auth']);

//ruta para mostrar recomendaciones
Route::get('/recomendaciones', [RecommendationController::class, 'verRecomendaciones'])
    ->middleware(['auth']);

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/dashboard', function () {
    return redirect('/moodcine');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/google', function(){
    return Socialite::driver('google')->redirect();
}) ->name('google.login');

Route::get('/auth/google/callback', function() {
    try {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create ([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(uniqid()),
                'img' => $googleUser->getAvatar(),
            ]);

        }
        Auth::login($user);

        return redirect('/moodcine');

    } catch (Exception $e){
        return redirect('/login');
    }
});

require __DIR__.'/auth.php';
