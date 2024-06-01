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
