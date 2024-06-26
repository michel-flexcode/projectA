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
                            <!-- Afficher les détails du rapport -->
                            <p class="mb-2"><strong>Company:</strong> {{ $result->company->name }}</p>
                            <p class="mb-2"><strong>Vulnerabilities:</strong> 
                                @foreach (explode(',', $result->vulnerabilities) as $vulnerability)
                                    {{ \App\Models\Vulnerability::find($vulnerability)->name }}@if (!$loop->last), @endif
                                @endforeach
                            </p>
                            <p class="mb-2"><strong>Consultants:</strong> 
                                @foreach (explode(',', $result->consultants) as $consultantId)
                                    {{ \App\Models\Consultant::find($consultantId)->name }}@if (!$loop->last), @endif
                                @endforeach
                            </p>
                            <p class="mb-2"><strong>State:</strong> {{ $result->state }}</p>
                            <p class="mb-2"><strong>Date:</strong> {{ $result->date }}</p>
                            <p class="mb-2"><strong>Recommendations:</strong> {{ $result->recommendations }}</p>
                            <p class="mb-2"><strong>Proposals:</strong> {{ $result->proposals }}</p>
                            <p class="mb-2"><strong>Conclusions:</strong> {{ $result->conclusions }}</p>
                        </div>
                        <!-- Boutons Edit, Show, Delete -->
                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('reports.edit', $result->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-center hover:bg-yellow-500 transition">Edit</a>
                            <a href="{{ route('reports.show', $result->id) }}" class="bg-blue-400 text-white px-3 py-1 rounded text-center hover:bg-blue-500 transition">Show</a>
                            <form action="{{ route('reports.destroy', $result->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this report?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-400 text-white px-3 py-1 rounded text-center hover:bg-red-500 transition">Delete</button>
                            </form>
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
