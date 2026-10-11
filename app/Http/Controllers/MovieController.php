<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieEditRequest;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MovieController extends Controller implements HasMiddleware
{
    // Middleware per proteggere le rotte
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['movieList']),
        ];
    }

    // Visualizzazione della lista dei film
    public function movieList()
    {
        $movies = Movie::all();

        return view('movie.movies', ['movies' => $movies]);
    }

    // Visualizzazione di tutti i film
    public function index()
    {
        $movies = Movie::all();

        return view('movie.index', compact('movies'));
    }

    // Visualizzazione del form per creare un film
    public function create()
    {
        return view('movie.create');
    }

    // Salvataggio di un nuovo film
    public function store(MovieRequest $request)
    {
        $movie = Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'plot' => $request->plot,
            'img' => $request->file('img')->store('images', 'public'),
        ]);

        return redirect()
            ->route('homepage')
            ->with('successMessage', 'Hai correttamente inserito il tuo film');
    }

    // Visualizzazione dei dettagli di un film
    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }

    // Visualizzazione del form per modificare un film
    public function edit(Movie $movie)
    {
        return view('movie.edit', compact('movie'));
    }

    // Aggiornamento di un film
    public function update(MovieEditRequest $request, Movie $movie)
    {
        $movie->update([
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'plot' => $request->plot,
        ]);

        // Controlla se è stata caricata una nuova immagine
        if ($request->hasFile('img')) {
            $request->validate(['img' => 'image']);
            $movie->update([
                'img' => $request->file('img')->store('images', 'public'),
            ]);
        }

        return redirect()
            ->route('homepage')
            ->with('successMessage', 'Hai correttamente modificato il tuo film');
    }

    public function destroy(Movie $movie){
        $movie->delete();
        return redirect()->route('homepage')->with('successMessage','Hai correttamente eliminato il film');
    }
}