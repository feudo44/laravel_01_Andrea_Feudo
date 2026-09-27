<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');
Route::get('/chi-siamo', function () {
    $users = [
        ['name' => 'Mario', 'surname' => 'Rossi', 'role' => 'Senior Manager'],
        ['name' => 'Anna', 'surname' => 'Marino', 'role' => 'HR'],
        ['name' => 'Mattia', 'surname' => 'Cimaroli', 'role' => 'Developer']
    ];
    return view('about-us', ['users' => $users]);
})->name('aboutUs');


Route::get('/chi-siamo/detail/{name}', function ($name) {
    $users = [
        ['name' => 'Mario', 'surname' => 'Rossi', 'role' => 'Senior Manager'],
        ['name' => 'Anna', 'surname' => 'Marino', 'role' => 'HR'],
        ['name' => 'Mattia', 'surname' => 'Cimaroli', 'role' => 'Developer']
    ];
    foreach ($users as $user) {
        if ($name == $user['name']) {
            return view('about-us-detail', ['user' => $user]);
        }
    }
})->name('aboutUsDetail');




Route::get('/contatti', function () {
    return view('contacts');
})->name('contacts');

Route::get('/movies', function () {
    $movies = [
        ['id' => '1', 'title' => 'Incontri ravvicinati del terzo tipo', 'director' => 'S. Spielberg', 'img' => '/media/poster/Spielberg.jpg', 'genres' => 'Sci-fi'],
        ['id' => '2', 'title' => '1917', 'director' => 'S. Mendes', 'img' => '/media/poster/1917.jpg', 'genres' => 'Guerra'],
        ['id' => '3', 'title' => 'Quei bravi ragazzi', 'director' => 'M. Scorsese', 'img' => '/media/poster/Scorsese.jpg', 'genres' => 'Noir'],
        ['id' => '4', 'title' => 'Barbie', 'director' => 'G. Gerwig', 'img' => '/media/poster/Barbie.jpg', 'genres' => 'Avventura'],
        ['id' => '5', 'title' => 'Lost in translation', 'director' => 'S. Coppola', 'img' => '/media/poster/Coppola.jpg', 'genres' => 'Drammatico']
    ];
    return view('movie.movies', ['movies' => $movies]);
})->name('movie.list');

Route::get('/movie/detail/{id}', function ($id) {
    $movies = [
        ['id' => '1', 'title' => 'Incontri ravvicinati del terzo tipo', 'director' => 'S. Spielberg', 'img' => '/media/poster/Spielberg.jpg', 'genres' => 'Sci-fi'],
        ['id' => '2', 'title' => '1917', 'director' => 'S. Mendes', 'img' => '/media/poster/1917.jpg', 'genres' => 'Guerra'],
        ['id' => '3', 'title' => 'Quei bravi ragazzi', 'director' => 'M. Scorsese', 'img' => '/media/poster/Scorsese.jpg', 'genres' => 'Noir'],
        ['id' => '4', 'title' => 'Barbie', 'director' => 'G. Gerwig', 'img' => '/media/poster/Barbie.jpg', 'genres' => 'Avventura'],
        ['id' => '5', 'title' => 'Lost in translation', 'director' => 'S. Coppola', 'img' => '/media/poster/Coppola.jpg', 'genres' => 'Drammatico']
    ];
    foreach($movies as $movie){
        if($id == $movie['id']){
            return view('movie.movie-detail', ['movie'=>$movie]);
        }
    }
})->name('movie.detail');