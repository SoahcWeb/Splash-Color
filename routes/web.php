<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Pages publiques
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

/**
 * ⚠️ IMPORTANT : ON REMPLACE la route portfolio statique
 */
Route::get('/portfolio', [PortfolioController::class, 'index'])
    ->name('portfolio.index');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| Dashboard (Breeze)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin Portfolio
|--------------------------------------------------------------------------
*/

Route::prefix('admin')                   // Toutes les routes commencent par /admin
    ->middleware(['auth','admin'])       // Protège avec auth + admin middleware
    ->name('admin.')                     // Préfixe pour le nom des routes
    ->group(function () {
        // Resource pour portfolio, sans show ni edit
        Route::resource('portfolio', PortfolioController::class)
            ->except(['show', 'edit']);

        // Route pour mise à jour titre inline
        Route::patch('portfolio/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');

        // Route pour suppression d'une image
        Route::delete('portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    });

/*
|--------------------------------------------------------------------------
| Profil utilisateur (Breeze)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Breeze
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
