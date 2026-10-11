<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


// HOMEPAGE
Route::get('/', [PublicController::class, 'homepage'])
    ->name('homepage');


// CHI SIAMO
Route::get('/chi-siamo', [PublicController::class, 'aboutUs'])
    ->name('aboutUs');

Route::get('/chi-siamo/detail/{name}', [PublicController::class, 'aboutUsDetail'])
    ->name('aboutUsDetail');


// CONTATTI
Route::get('/contatti', function () {
    return view('contacts');
})->name('contacts');


// INVIO EMAIL
Route::post('/contact-us', [PublicController::class, 'contactUs'])
    ->name('contactUs');


// LISTA FILM
Route::get('/movies', [MovieController::class, 'movieList'])
    ->name('movie.list');


// DETTAGLIO FILM
Route::get('/movie/detail/{movie}', [MovieController::class, 'show'])
    ->name('movie.detail');


// INSERIMENTO FILM
Route::get('/movie/create', [MovieController::class, 'create'])
    ->name('movie.create');

Route::post('/movie/submit', [MovieController::class, 'store'])
    ->name('movie.submit');


// ELENCO FILM DATABASE
Route::get('/movie/index', [MovieController::class, 'index'])
    ->name('movie.index');


// VISUALIZZAZIONE SINGOLO FILM
Route::get('/movie/show/{movie}', [MovieController::class, 'show'])
    ->name('movie.show');


// MODIFICA FILM
Route::get('/movie/edit/{movie}', [MovieController::class, 'edit'])
    ->name('movie.edit');


// AGGIORNAMENTO FILM
Route::put('/movie/update/{movie}', [MovieController::class, 'update'])
    ->name('movie.update');

Route::delete('/movie/delete/{movie}', [MovieController::class,'destroy'])->name('movie.delete');

Route::get('/user/profile', [PublicController::class, 'profile'])->name('user.profile');