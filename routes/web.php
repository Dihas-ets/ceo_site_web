<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes([
    'register' => false,
]);

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/projects', [ProjectController::class, 'index'])
        ->name('admin.projects.index');
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])
        ->name('admin.projects.create');
    Route::post('/admin/projects', [ProjectController::class, 'store'])
        ->name('admin.projects.store');
});


use App\Http\Controllers\PodcastController;


    Route::get('/admin/podcasts', [PodcastController::class, 'index'])->name('admin.podcasts.index');
    Route::get('/admin/podcasts/create', [PodcastController::class, 'create'])->name('admin.podcasts.create');
    Route::post('/admin/podcasts', [PodcastController::class, 'store'])->name('admin.podcasts.store');

// Modifier un projet
Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');

// Supprimer un projet
Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

// Modifier un podcast
Route::get('/admin/podcasts/{podcast}/edit', [PodcastController::class, 'edit'])->name('admin.podcasts.edit');
Route::put('/admin/podcasts/{podcast}', [PodcastController::class, 'update'])->name('admin.podcasts.update');

// Supprimer un podcast
Route::delete('/admin/podcasts/{podcast}', [PodcastController::class, 'destroy'])->name('admin.podcasts.destroy');

// Page des podcasts en avant


Route::get('/admin/podcasts/featured', [PodcastController::class, 'featured'])
    ->name('admin.podcasts.featured');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('socials', \App\Http\Controllers\Admin\SocialController::class);
});
