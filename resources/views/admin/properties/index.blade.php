@extends('admin.admin')
@section('title', 'Tous les biens')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->surface }}m²</td>
                    <td>{{ number_format($property->price, thousands_separator: ' ') }}€</td>
                    <td>{{ $property->city }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-primary">Modifier</a>
                            <form id="deleteForm_{{ $property->id }}" action="{{ route('admin.property.destroy', $property) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="confirmDelete({{ $property->id }})">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $properties->links() }}

    <script>
        function confirmDelete(propertyId) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cet élément?")) {
                document.getElementById('deleteForm_' + propertyId).submit();
            } else {
                // Impedisce all'evento di propagarsi, quindi il modulo non verrà inviato al server
                event.preventDefault();
        }
    }
    </script>
@endsection
