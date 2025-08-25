@extends('admin.layout')

@section('content')
<h1>Ajouter un nouveau projet</h1>

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" style="max-width:500px;">
    @csrf
    <div style="margin-bottom:10px;">
        <label>Titre du projet</label><br>
        <input type="text" name="title" required style="width:100%; padding:8px;">
    </div>
    <div style="margin-bottom:10px;">
        <label>Description</label><br>
        <textarea name="description" required style="width:100%; padding:8px;"></textarea>
    </div>
    <div style="margin-bottom:10px;">
        <label>Image</label><br>
        <input type="file" name="image" required>
    </div>
    <div style="margin-bottom:10px;">
        <label>Lien du projet</label><br>
        <input type="url" name="link" style="width:100%; padding:8px;">
    </div>
    <button type="submit">Ajouter le projet</button>
</form>
@endsection
