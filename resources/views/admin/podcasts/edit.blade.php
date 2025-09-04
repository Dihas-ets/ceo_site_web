@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Modifier le Podcast</h2>

    <form action="{{ route('admin.podcasts.update', $podcast) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Titre -->
        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $podcast->title) }}">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $podcast->description) }}</textarea>
        </div>

        <!-- Auteur -->
        <div class="mb-3">
            <label>Auteur</label>
            <input type="text" name="author" class="form-control" required value="{{ old('author', $podcast->author) }}">
        </div>

        <!-- Durée -->
        <div class="mb-3">
            <label>Durée</label>
            <input type="text" name="duration" class="form-control" placeholder="Ex: 1h30" value="{{ old('duration', $podcast->duration) }}">
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label>Image d'aperçu</label>
            <input type="file" name="image" class="form-control">
            @if($podcast->image)
                <img src="{{ asset('storage/'.$podcast->image) }}" width="100" class="mt-2">
            @endif
        </div>

        <!-- Catégorie -->
        <div class="mb-3">
            <label>Catégorie</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $podcast->category_id)==$category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Type -->
        <div class="mb-3">
            <label>Type</label>
            <select name="type" id="typeSelect" class="form-control" required>
                <option value="audio" {{ old('type', $podcast->type)=='audio' ? 'selected' : '' }}>Audio</option>
                <option value="video" {{ old('type', $podcast->type)=='video' ? 'selected' : '' }}>Vidéo</option>
            </select>
        </div>

        <!-- Format -->
        <div class="mb-3">
            <label>Format</label>
            <select name="format" id="formatSelect" class="form-control" required>
                <option value="lien" {{ old('format', $podcast->format)=='lien' ? 'selected' : '' }}>Lien</option>
                <option value="fichier" {{ old('format', $podcast->format)=='fichier' ? 'selected' : '' }}>Fichier</option>
            </select>
        </div>

        <!-- Lien -->
        <div class="mb-3" id="linkField">
            <label>Lien</label>
            <input type="url" name="link" class="form-control" value="{{ old('link', $podcast->link) }}">
        </div>

        <!-- Fichier -->
        <div class="mb-3" id="fileField" style="display:none;">
            <label>Fichier</label>
            <input type="file" name="file_path" class="form-control">
            @if($podcast->file_path)
                <a href="{{ asset('storage/'.$podcast->file_path) }}" target="_blank">Voir le fichier actuel</a>
            @endif
        </div>

        <!-- Featured -->
        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" name="featured" value="1" id="featuredCheck" class="form-check-input" {{ $podcast->featured ? 'checked' : '' }}>
                <label for="featuredCheck" class="form-check-label">Mettre en avant</label>
            </div>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" name="status" value="publié" id="statusCheck" class="form-check-input" {{ $podcast->status=='publié' ? 'checked' : '' }}>
                <label for="statusCheck" class="form-check-label">Publié (sinon brouillon)</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<script>
function toggleFields() {
    const format = document.getElementById('formatSelect').value;
    document.getElementById('linkField').style.display = format==='lien' ? 'block' : 'none';
    document.getElementById('fileField').style.display = format==='fichier' ? 'block' : 'none';
}

document.addEventListener('DOMContentLoaded', ()=>{
    toggleFields();
    document.getElementById('formatSelect').addEventListener('change', toggleFields);
});
</script>
@endsection
