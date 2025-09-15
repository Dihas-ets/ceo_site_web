@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h1>Ajouter une catégorie</h1>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mb-3">← Retour à la liste</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom de la catégorie :</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>
@endsection
