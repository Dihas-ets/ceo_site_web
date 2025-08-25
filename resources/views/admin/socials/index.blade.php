@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Réseaux Sociaux</h2>

    <a href="{{ route('admin.socials.create') }}" class="btn btn-primary mb-3">Ajouter un réseau social</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Icône</th>
                <th>Lien</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($socials as $social)
            <tr>
                <td>{{ $social->name }}</td>
                <td><i class="{{ $social->icon }}"></i></td>
                <td><a href="{{ $social->link }}" target="_blank">{{ $social->link }}</a></td>
                <td>
                    <a href="{{ route('admin.socials.edit', $social->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('admin.socials.destroy', $social->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
