@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Liste des Podcasts</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Bouton Ajouter -->
    <a href="{{ route('admin.podcasts.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Ajouter un Podcast
    </a>
    


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Catégorie</th>
                <th>Type</th>
                <th>Format</th>
                <th>Fichier / Lien</th>
                <th>En avant</th> <!-- ✅ Nouvelle colonne -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($podcasts as $podcast)
                <tr>
                    <td>{{ $podcast->title }}</td>
                    <td>{{ $podcast->author }}</td>
                    <td>{{ $podcast->category->name }}</td>
                    <td>{{ ucfirst($podcast->type) }}</td>
                    <td>{{ ucfirst($podcast->format) }}</td>
                    <td>
                        @if($podcast->format === 'lien')
                            <a href="{{ $podcast->link }}" target="_blank">Voir le lien</a>
                        @else
                            <a href="{{ asset('storage/'.$podcast->file_path) }}" target="_blank">Télécharger le fichier</a>
                        @endif
                    </td>
                    <td>
                        @if($podcast->featured && $podcast->type === 'video')
                            🌟 Oui
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <!-- Modifier -->
                        <a href="{{ route('admin.podcasts.edit', $podcast) }}" class="btn btn-warning btn-sm" title="Modifier">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <!-- Supprimer -->
                        <form action="{{ route('admin.podcasts.destroy', $podcast) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer"
                                onclick="return confirm('Voulez-vous vraiment supprimer ce podcast ?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Aucun podcast trouvé.</td> <!-- adapté car 8 colonnes maintenant -->
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
