@extends('admin.admin')
@section('title', 'Toutes les options')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Ajouter une option</a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>

                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($options as $option)
                <tr>
                    <td>{{ $option->name }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-primary">Modifier</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-target="#confirmModal_{{ $option->id }}"
                                onclick="showConfirmModalOption({{ $option->id }})">Supprimer</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $options->links() }}
@include('shared.modaloption')
    
@endsection
