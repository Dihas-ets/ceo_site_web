@extends('admin.layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Gestion des utilisateurs</h2>

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">➕ Ajouter un utilisateur</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : 'secondary' }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm">Modifier</a>
                    
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
