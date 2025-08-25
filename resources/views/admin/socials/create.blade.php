@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Ajouter un réseau social</h2>

    <form action="{{ route('admin.socials.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom du réseau social</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Ex: Facebook">
            @error('name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icône (classe Font Awesome)</label>
            <input type="text" name="icon" class="form-control" value="{{ old('icon') }}" placeholder="Ex: fab fa-facebook">
            <small class="text-muted">Exemples : <code>fab fa-facebook</code>, <code>fab fa-instagram</code></small>
            @error('icon')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Lien (URL)</label>
            <input type="url" name="link" class="form-control" value="{{ old('link') }}" placeholder="https://facebook.com/tonpage">
            @error('link')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.socials.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
