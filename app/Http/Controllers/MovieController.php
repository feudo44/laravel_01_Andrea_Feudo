<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieEditRequest;
use App\Http\Requests\MovieRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

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
        $genres = Genre::all();
        return view('movie.create', compact('genres'));
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
            'user_id' => Auth::user()->id
        ]);

        $movie->genres()->attach($request->genres);

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
        if ($movie->user_id == Auth::user()->id) {
            return view('movie.edit', compact('movie'));
        }else{
            return redirect()->route('homepage')->with('errorMessage','Non puoi vedere questa pagina');
        }

    }

    // Aggiornamento di un film
    public function update(MovieEditRequest $request, Movie $movie)
    {
        if($movie->user_id == Auth::user()->id)
        {$movie->update([
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
            ->with('successMessage', 'Hai correttamente modificato il tuo film');}else{
                return redirect()->route('homepage')->with('errorMessage','Non puoi vedere questa pagina');
            }
    }

    public function destroy(Movie $movie)
    {
        if ($movie->user_id == Auth::user()->id)
        {$movie->delete();
        return redirect()->route('homepage')->with('successMessage', 'Hai correttamente eliminato il film');}else{
            return redirect()->route('homepage')->with('errorMessage','Non puoi vedere questa pagina');
        }
    }
}