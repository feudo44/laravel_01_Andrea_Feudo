<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public $movies = [
        ['id' => '1', 'title' => 'Incontri ravvicinati del terzo tipo', 'director' => 'S. Spielberg', 'img' => '/media/poster/Spielberg.jpg', 'genres' => 'Sci-fi'],
        ['id' => '2', 'title' => '1917', 'director' => 'S. Mendes', 'img' => '/media/poster/1917.jpg', 'genres' => 'Guerra'],
        ['id' => '3', 'title' => 'Quei bravi ragazzi', 'director' => 'M. Scorsese', 'img' => '/media/poster/Scorsese.jpg', 'genres' => 'Noir'],
        ['id' => '4', 'title' => 'Barbie', 'director' => 'G. Gerwig', 'img' => '/media/poster/Barbie.jpg', 'genres' => 'Avventura'],
        ['id' => '5', 'title' => 'Lost in translation', 'director' => 'S. Coppola', 'img' => '/media/poster/Coppola.jpg', 'genres' => 'Drammatico']
    ];
    public function movieList()
    {
        return view('movie.movies', ['movies' => $this->movies]);
    }

    public function movieDetail($id) {
    foreach($this->movies as $movie){
        if($id == $movie['id']){
            return view('movie.movie-detail', ['movie'=>$movie]);
        }
    }
}
}
