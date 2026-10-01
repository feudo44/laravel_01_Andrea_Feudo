<div class="card mb-3" style="width: 18rem;">
    <img src="{{ $movie['img'] }}" class="card-img-top cardImg" alt="{{ $title }}">
    <div class="card-body">
        <h5 class="card-title">{{$title}}</h5>
        <h5 class="card-title muted">{{$movie['director']}}</h5>
        <p class="card-text">{{ $movie['genres'] }}</p>
        <a href="{{ route('movie.detail', ['id' => $movie['id']]) }}" class="btn btn-primary">Leggi di
            più</a>
    </div>
</div>