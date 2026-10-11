<x-layout>


    <!-- Header -->

    <header>
        <div class="container-fluid movies">
            <div class="row h-100 justify-content-center">
                <div class="row">
                    <h2 class="display-5 text-white text-center text-color">Tutti i nostri film</h2>
                </div>
                @forelse ($movies as $movie)
                    <div class="col-12 col-md-3">
                        <x-card 
                        :movie="$movie"

                        title="{{ $movie['title'] }}"

                        />
                    </div>
                    @empty
                    <div class="col-12 d-flex justify-content-center">
                        <h2 class="text-white text-center text-color">Nessun film ancora in piattaforma</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </header>















</x-layout>