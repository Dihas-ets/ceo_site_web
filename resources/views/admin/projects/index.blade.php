@extends('admin.layout')

@section('content')
<h2>Liste des projets</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif


<a href="{{ route('admin.projects.create') }}" class="btn btn-success mb-3">
    <i class="bi bi-plus-circle"></i> Ajouter un nouveau projet
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Image</th>
            <th>Lien</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->title }}</td>
            <td>{{ $project->description }}</td>
            <td>
                @if($project->image)
                    <img src="{{ asset('storage/'.$project->image) }}" alt="image" style="max-width:100px;">
                @endif
            </td>
            <td>
                @if($project->link)
                    <a href="{{ $project->link }}" target="_blank">Voir le lien</a>
                @endif
            </td>
            <td>
    <!-- Bouton Modifier -->
    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm" title="Modifier">
        <i class="bi bi-pencil-square"></i>
    </a>

    <!-- Bouton Supprimer -->
    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer"
            onclick="return confirm('Voulez-vous vraiment supprimer ce projet ?')">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
