<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\admin\SocialController;
use App\Http\Controllers\Admin\UserController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth sans inscription publique
Auth::routes([
    'register' => false,
]);

/*
|--------------------------------------------------------------------------
| ROUTES ADMIN / GESTIONNAIRE
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard (accessible par admin et gestionnaire)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Projets (admin et gestionnaire)
    Route::resource('projects', ProjectController::class);

    // Podcasts
    Route::resource('podcasts', PodcastController::class);
    Route::get('/podcasts/featured', [PodcastController::class, 'featured'])->name('podcasts.featured');

    // Réseaux sociaux
    Route::resource('socials', SocialController::class);

    // Utilisateurs → seulement admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
    });
});
