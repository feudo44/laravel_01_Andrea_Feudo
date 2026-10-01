<x-layout>



    <!-- Header -->

    <header>
        <div class="container-fluid header">
            <div class="row h-100 justify-content-around align-items-center">
                <div class="col-6">
                    <h2 class="text-white text-color text-center">Chi siamo</h2>
                    <p class="text-white text-color">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
                        magnam iusto sint dolorem. Molestiae inventore delectus quos magnam, temporibus eos harum? Cum
                        dicta quisquam eligendi eaque odit odio hic, explicabo saepe cumque magnam pariatur sapiente
                        adipisci animi perspiciatis illo architecto voluptate atque, voluptas dolore quidem aspernatur?
                        Culpa voluptatem omnis dolorum?</p>
                </div>
                <div class="col-6 text-center">
                    <img src="/media/team3.png" alt="foto del team" class="img-team"
                        style="max-width: 700px; width: 100%;">
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container userHeight">
            <div class="row h-100 justify-content-around align-items-center">
                @foreach ($users as $user)
                    <div class="col-12 col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$user['name']}} {{ $user['surname'] }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $user['role'] }}</h6>
                                <a href="{{ route('aboutUsDetail', ['name' => $user['name']]) }}" class="card-link">Leggi di
                                    più</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
















</x-layout>