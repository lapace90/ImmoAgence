@extends('base')
@section('title', 'Bienvenu chez')
@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence Immo</h1>
            <p>Maecenas non vehicula ligula. Quisque cursus urna odio, nec efficitur nunc accumsan eu. Vivamus non rutrum
                libero. Proin iaculis hendrerit tempor. Nulla imperdiet egestas diam, ut ultricies sem feugiat et. Sed
                aliquet diam lacus, et semper odio vehicula a. </p>
        </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2><hr>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
