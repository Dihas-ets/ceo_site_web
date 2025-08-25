@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Ajouter un Podcast</h2>

    <form action="{{ route('admin.podcasts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Auteur</label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Catégorie</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Type de podcast</label>
            <select name="type" id="typeSelect" class="form-control" required>
                   <option value="audio">Audio</option>
                  <option value="video">Vidéo</option>
            </select>

        </div>

        <div class="mb-3">
            <label>Format</label>
            <select name="format" id="format" class="form-control" required>
                <option value="lien">Lien</option>
                <option value="fichier">Fichier</option>
            </select>
        </div>

        <div class="mb-3" id="link-field">
            <label>Lien du podcast</label>
            <input type="text" name="link" class="form-control">
        </div>

        <div class="mb-3" id="file-field" style="display:none;">
            <label>Fichier du podcast</label>
            <input type="file" name="file_path" class="form-control">
        </div>

        <div class="mb-3" id="featuredWrapper" style="display:none;">
    <div class="form-check">
        <input type="checkbox" name="featured" value="1" id="featuredCheck" class="form-check-input">
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
    // IMPORTANT : ton select "Type" doit avoir id="typeSelect"
    const typeSelect = document.getElementById('typeSelect');
    if(typeSelect){
        typeSelect.addEventListener('change', toggleFeaturedByType);
        toggleFeaturedByType(); // au chargement
    }
});
</script>




        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<script>
    const formatSelect = document.getElementById('format');
    const linkField = document.getElementById('link-field');
    const fileField = document.getElementById('file-field');

    formatSelect.addEventListener('change', function() {
        if(this.value === 'lien') {
            linkField.style.display = 'block';
            fileField.style.display = 'none';
        } else {
            linkField.style.display = 'none';
            fileField.style.display = 'block';
        }
    });
</script>
@endsection
