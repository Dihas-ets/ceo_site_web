@extends('admin.layout')

@section('content')
    <div class="container mt-5">
        <h1>Bienvenue sur le Dashboard Admin 🚀</h1>
        <p>Bienvenue madame.</p>

        <!-- Bouton de déconnexion -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Déconnexion</button>
        </form>
    </div>
@endsection
