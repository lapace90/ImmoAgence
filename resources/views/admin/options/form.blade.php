@extends('admin.admin')
@section('title', $option->exists ? 'Editer une option' : 'Ajouter une option')

@section('content')
    <h1>@yield('title')</h1>
    <hr>
    <form class="vstack gap-2"
        action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', ['option' => $option]) }}"
        method="POST">
        @csrf
        @method($option->exists ? 'put' : 'post')

        
        @include('shared.input', [
                    'label' => 'Nom',
                    'name' => 'name',
                    'value' => $option->name,
                ])

        <div>
            <button class="btn btn-primary">
                @if ($option->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>

@endsection
