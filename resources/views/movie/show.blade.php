<x-layout>
    <div class="container-fluid movies">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center text-white text-color">
                <h2>{{ $movie->title }}</h2>
                <h3>Regista: {{ $movie->director }}</h3>
                <h4>Anno: {{ $movie->year }}</h4>
                <p>{{ $movie->plot }}</p>
                <p>Creato da: {{ $movie->user?->name ?? 'Utente sconosciuto' }}</p>
                <ul>
                    @forelse ($movie->genres as $genre)
                        <li>{{ $genre->name }}</li>
                    @empty

                    @endforelse
                </ul>

                
            </div>

            <div class="col-12 col-md-6 text-center">
                @if ($movie->img)
                    <img src="{{ Storage::url($movie->img) }}" alt="Poster di {{ $movie->title }}" class="img-fluid">
                @endif
            </div>

            @auth
                @if ($movie->user_id == Auth::id())
                    <div class="row justify-content-end mt-3">
                        <div class="col-auto">
                            <form action="{{ route('movie.delete', $movie) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Elimina il film</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</x-layout>