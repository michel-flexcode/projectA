{{-- <!-- resources/views/search/results.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold mb-6">Search Results</h1>
        <p>You searched for: {{ $query }}</p>
        <!-- Ajoutez ici la logique pour afficher les résultats de recherche -->
    </div>
@endsection --}}


{{-- <x-app-layout>
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
</x-app-layout> --}}


<x-app-layout>
    <div class="container mx-auto mt-8 text-white">
        <h1 class="text-2xl font-bold mb-4 text-center">Search Results</h1>

        @if ($results->isEmpty())
            <p class="text-center">No results found.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ml-2 mr-2">
                @foreach ($results as $result)
                    <div class="bg-gray-800 rounded-lg p-6 text-white flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl font-bold mb-2 text-center">{{ $result->name_doc }}</h2>
                            <p class="mb-2"><strong>Company:</strong> {{ $result->company->name }}</p>
                            <p class="mb-2"><strong>Vulnerabilities:</strong> {{ $result->vulnerabilities }}</p>
                            <p class="mb-2"><strong>State:</strong> {{ $result->state }}</p>
                            <p class="mb-2"><strong>Date:</strong> {{ $result->date }}</p>
                            <p class="mb-2"><strong>Recommendations:</strong> {{ $result->recommendations }}</p>
                            <p class="mb-2"><strong>Proposals:</strong> {{ $result->proposals }}</p>
                            <p class="mb-2"><strong>Conclusions:</strong> {{ $result->conclusions }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination links -->
            <div class="mt-4 flex justify-center">
                {{ $results->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
