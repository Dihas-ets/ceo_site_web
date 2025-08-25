@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Modifier le Podcast</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.podcasts.update', $podcast) }}" method="POST" enctype="multipart/form-data" style="max-width:600px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="title" class="form-control" value="{{ $podcast->title }}" required>
        </div>

        <div class="mb-3">
            <label>Auteur</label>
            <input type="text" name="author" class="form-control" value="{{ $podcast->author }}" required>
        </div>

        <div class="mb-3">
            <label>Catégorie</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $podcast->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" id="typeSelect" class="form-control" required>
                <option value="audio" {{ $podcast->type=='audio' ? 'selected' : '' }}>Audio</option>
                <option value="video" {{ $podcast->type=='video' ? 'selected' : '' }}>Vidéo</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Format</label>
            <select name="format" id="formatSelect" class="form-control" required onchange="toggleFields()">
                <option value="lien" {{ $podcast->format=='lien' ? 'selected' : '' }}>Lien</option>
                <option value="fichier" {{ $podcast->format=='fichier' ? 'selected' : '' }}>Fichier</option>
            </select>
        </div>

        <div class="mb-3" id="linkField" style="display: none;">
            <label>Lien</label>
            <input type="url" name="link" class="form-control" value="{{ $podcast->link }}">
        </div>

        <div class="mb-3" id="fileField" style="display: none;">
            <label>Fichier</label>
            <input type="file" name="file_path" class="form-control">
            @if($podcast->file_path)
                <p>Fichier actuel : <a href="{{ asset('storage/'.$podcast->file_path) }}" target="_blank">Voir</a></p>
            @endif
        </div>

        <div class="mb-3" id="featuredWrapper" style="display:none;">
    <div class="form-check">
        <input type="checkbox" name="featured" value="1" id="featuredCheck"
               class="form-check-input" {{ $podcast->featured ? 'checked' : '' }}>
        <label class="form-check-label" for="featuredCheck">Mettre en avant (vidéo uniquement)</label>
    </div>
</div>

<script>
function toggleFeaturedByType(){
    const type = document.getElementById('typeSelect')?.value || '';
    const box = document.getElementById('featuredWrapper');
    if(!box) return;
    box.style.display = (type === 'video') ? 'block' : 'none';
    if(type !== 'video'){
        const chk = document.getElementById('featuredCheck');
        if(chk) chk.checked = false;
    }
}
document.addEventListener('DOMContentLoaded', () => {
    const typeSelect = document.getElementById('typeSelect'); // ton select type doit avoir cet id
    if(typeSelect){
        typeSelect.addEventListener('change', toggleFeaturedByType);
        toggleFeaturedByType(); // au chargement pour afficher/masquer correctement
    }
});
</script>



        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<script>
function toggleFields() {
    const format = document.getElementById('formatSelect').value;
    document.getElementById('linkField').style.display = format === 'lien' ? 'block' : 'none';
    document.getElementById('fileField').style.display = format === 'fichier' ? 'block' : 'none';
}
// Afficher le champ correct au chargement
window.onload = toggleFields;
</script>
@endsection
