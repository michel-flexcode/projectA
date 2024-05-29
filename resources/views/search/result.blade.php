{{-- <!-- resources/views/search/results.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold mb-6">Search Results</h1>
        <p>You searched for: {{ $query }}</p>
        <!-- Ajoutez ici la logique pour afficher les résultats de recherche -->
    </div>
@endsection --}}


<x-app-layout>
    <div class="container mx-auto mt-8 text-white">
        <h1 class="text-2xl font-bold mb-4">Search Results</h1>

        @if ($results->isEmpty())
            <p>No results found.</p>
        @else
            <ul>
                @foreach ($results as $result)
                    <li>
                        <strong>{{ $result->name }}</strong><br>
                        {{ $result->description }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
