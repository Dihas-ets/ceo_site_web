@extends('admin.layout')

@section('title', 'Tableau de bord')

@section('content')
<div class="container-fluid">
    @include('admin.dashboard-content') {{-- Contenu réel du dashboard --}}
</div>
@endsection

@section('scripts')
    @include('admin.dashboard-scripts') {{-- Scripts pour graphiques et interactions --}}
@endsection
