@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Modifier le projet</h2>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" style="max-width:500px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Titre du projet</label>
            <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $project->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" onchange="previewImage(event)">
            @if($project->image)
                <img id="imagePreview" src="{{ asset('storage/'.$project->image) }}" style="max-width:100%; margin-top:10px;">
            @else
                <img id="imagePreview" src="#" style="display:none; max-width:100%; margin-top:10px;">
            @endif
        </div>

        <div class="mb-3">
            <label>Lien (optionnel)</label>
            <input type="url" name="link" class="form-control" value="{{ $project->link }}">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');

    if(input.files && input.files[0]){
        const reader = new FileReader();
        reader.onload = function(e){
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
