<!-- resources/views/search/results.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold mb-6">Search Results</h1>
        <p>You searched for: {{ $query }}</p>
        <!-- Ajoutez ici la logique pour afficher les résultats de recherche -->
    </div>
@endsection
