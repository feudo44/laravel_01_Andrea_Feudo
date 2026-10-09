<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;


class MovieController extends Controller
{
    // public $movies = [
    //     ['id' => '1', 'title' => 'Incontri ravvicinati del terzo tipo', 'director' => 'S. Spielberg', 'img' => '/media/poster/Spielberg.jpg', 'genres' => 'Sci-fi'],
    //     ['id' => '2', 'title' => '1917', 'director' => 'S. Mendes', 'img' => '/media/poster/1917.jpg', 'genres' => 'Guerra'],
    //     ['id' => '3', 'title' => 'Quei bravi ragazzi', 'director' => 'M. Scorsese', 'img' => '/media/poster/Scorsese.jpg', 'genres' => 'Noir'],
    //     ['id' => '4', 'title' => 'Barbie', 'director' => 'G. Gerwig', 'img' => '/media/poster/Barbie.jpg', 'genres' => 'Avventura'],
    //     ['id' => '5', 'title' => 'Lost in translation', 'director' => 'S. Coppola', 'img' => '/media/poster/Coppola.jpg', 'genres' => 'Drammatico']
    // ];
    public function movieList()
    {
        $movies = Movie::all();
        return view('movie.movies', ['movies'=> $movies]);
    }

    // public function movieDetail($id)
    // {
    //     foreach ($this->movies as $movie) {
    //         if ($id == $movie['id']) {
    //             return view('movie.movie-detail', ['movie' => $movie]);
    //         }
    //     }
    // }

    public function create(){
        return view('movie.create');
    }

    public function store(MovieRequest $request){
        $movie = Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'plot' => $request->plot,
            'img'=> $request->file('img')->store('images', 'public'),
            
        ]);

        

        return redirect()->route('homepage')->with('successMessage', 'Hai correttamente inserito il tuo film');
    }
}
