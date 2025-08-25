@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Modifier le réseau social</h2>

    <form action="{{ route('admin.socials.update', $social->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom du réseau social</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $social->name) }}">
            @error('name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icône (classe Font Awesome)</label>
            <input type="text" name="icon" class="form-control" value="{{ old('icon', $social->icon) }}">
            <small class="text-muted">Exemples : <code>fab fa-twitter</code>, <code>fab fa-linkedin</code></small>
            @error('icon')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Lien (URL)</label>
            <input type="url" name="link" class="form-control" value="{{ old('link', $social->link) }}">
            @error('link')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.socials.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
