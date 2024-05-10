@extends('admin.admin')
@section('title', $property->exists ? 'Editer un bien' : 'Ajouter un bien')

@section('content')
    <h1>@yield('title')</h1>
    <hr>
    <form class="vstack gap-2"
        action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', ['property' => $property]) }}"
        method="POST">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $property->title,
            ])
            <div class="col row">
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'surface',
                    'value' => $property->surface,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Prix',
                    'name' => 'price',
                    'value' => $property->price,
                ])
            </div>

        </div>
        <div class="row">
            @include('shared.input', [
                'type' => 'textarea',
                'name' => 'description',
                'value' => $property->description,
            ])
        </div>
        <div class="row">
            @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Pièces',
                    'name' => 'rooms',
                    'value' => $property->rooms,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Chambres',
                    'name' => 'bedrooms',
                    'value' => $property->bedrooms,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Étage',
                    'name' => 'floor',
                    'value' => $property->floor,
                ])
        </div>
        <div class="row">
            @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Adress',
                    'name' => 'address',
                    'value' => $property->address,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Ville',
                    'name' => 'city',
                    'value' => $property->city,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'label' => 'Code Postal',
                    'name' => 'zipcode',
                    'value' => $property->zipcode,
                ])
        </div>
        @include('shared.select', [
                    'label' => 'Options',
                    'name' => 'options',
                    'multiple' => true,
                    'value' => $property->options()->pluck('id'),
                    'options' => $options
                    ])
        @include('shared.checkbox', [
            'label' => 'Vendu',
            'name' => 'sold',
            'value' => $property->sold,
            
                ])
 
        <div>
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>

@endsection
