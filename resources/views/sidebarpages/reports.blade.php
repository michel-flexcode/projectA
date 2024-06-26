<x-app-layout>

    <div class="container mx-auto">

        <h1 class="text-3xl font-bold mb-4 text-white text-center py-2">List of Company Reports</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ml-2 mr-2">

            @foreach ($reports as $report)

                <div class="bg-gray-800 rounded-lg p-6 text-white flex flex-col justify-between">

                    <div>

                        <h2 class="text-xl font-bold mb-2 text-center">{{ $report->name_doc }}</h2>

                        <p class="mb-2"><strong>Company:</strong>{{ $report->company->name }}</p>

                        <p class="mb-2"><strong>Vulnerabilities:</strong>
                            @foreach (explode(',', $report->vulnerabilities) as $vulnerabilityId)
                                <!-- Eloquent system to get info from id -->
                                {{ App\Models\Vulnerability::find($vulnerabilityId)->name }}
                                @if (!$loop->last), @endif
                            @endforeach
                        </p>

                        <!-- Afficher les consultants -->
                        <p class="mb-2"><strong>Consultants:</strong>
                            @foreach (explode(',', $report->consultants) as $consultantId)
                                <!-- Eloquent system to get info from id -->
                                {{ App\Models\Consultant::find($consultantId)->name }}
                                @if (!$loop->last), @endif
                            @endforeach
                        </p>

                        <p class="mb-2"><strong>State:</strong> {{ $report->state }}</p>

                        <p class="mb-2"><strong>Date:</strong> {{ $report->date }}</p>

                        <p class="mb-2"><strong>Recommendations:</strong> {{ $report->recommendations }}</p>

                        <p class="mb-2"><strong>Proposals:</strong> {{ $report->proposals }}</p>

                        <p class="mb-2"><strong>Conclusions:</strong> {{ $report->conclusions }}</p>

                    </div>

                    <div class="flex justify-between items-center mt-4">

                        <!-- Bouton Edit -->
                        <a href="{{ route('reports.edit', $report->id) }}"
                            class="bg-yellow-400 text-white px-3 py-1 rounded text-center hover:bg-yellow-500 transition">Edit</a>

                        <!-- Bouton Print PDF -->
                        <a href="{{ route('reports.show', $report->id) }}"
                            class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition duration-300">Show</a>

                        <!-- Bouton Delete -->
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this report?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-400 text-white px-3 py-1 rounded text-center hover:bg-red-500 transition">Delete</button>
                        </form>

                    </div>

                </div>

            @endforeach

        </div>

        <!-- Pagination links -->

        <div class="mt-4 justify-center ml-8 mr-8 mb-4">

            {{ $reports->links() }}

        </div>

        <!-- Bouton Back to Dashboard -->
        <div class="flex justify-center">
            <a href="{{ route('dashboard') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Back to
                Dashboard</a>
        </div>aa

    </div>

</x-app-layout>
