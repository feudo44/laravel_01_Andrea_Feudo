<x-layout>
    <div class="container-fluid movies">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center text-white text-color">
                <h2>{{ $movie->title }}</h2>
                <h3>Regista: {{ $movie->director }}</h3>
                <p>{{ $movie->plot }}</p>
            </div>
            <div class="col-12 col-md-6">
                <img src="{{ Storage::url($movie->img) }}" alt="Poster di {{ $movie->title }}">
            </div>
            <div class="row">
                <form action="{{ route('movie.delete', compact('movie')) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" >Elimina il film</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>