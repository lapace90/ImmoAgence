@extends('base')
@section('title', 'Tous nos bien en vente')
@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Surface Min" class="form-control" name="surface"
                value="{{ $input['surface'] ?? '' }}">
            <input type="number" placeholder="Nombre de pièces Min" class="form-control" name="rooms"
                value="{{ $input['rooms'] ?? '' }}">
            <input type="number" placeholder="Budget Max" class="form-control" name="price"
                value="{{ $input['price'] ?? '' }}">
            <input placeholder="Mot clef" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
            <button class="btn btn-primary flex-grow-0">Rechercher</button>
        </form>
    </div>


    <div class="container">
        <div class="row">
            <div class="container">
                <h2>Nos derniers biens</h2>
                <hr>
                <div class="row">
                    @forelse ($properties as $property)
                        <div class="col-4 g-3">
                            @include('property.card')
                        </div>
                        @empty
                        <div class="col">
                            Aucun bien ne corréspond à votre recherche
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="my-5">
            {{ $properties->links() }}
        </div>
    </div>
{{-- provare a mettere una targhetta sulla card dei beni venduti --}}

@endsection
