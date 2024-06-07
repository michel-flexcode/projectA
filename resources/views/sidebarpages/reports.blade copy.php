<x-app-layout>

    <div class="container mx-auto">

        <h1 class="text-3xl font-bold mb-4 text-white text-center py-2">List of Company Reports</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ml-2 mr-2">

            @foreach ($reports as $report)

                <div class="bg-gray-800 rounded-lg p-6 text-white flex flex-col justify-between">

                    <div>

                        <h2 class="text-xl font-bold mb-2 text-center">{{ $report->company->name }}</h2>

                        <p class="mb-2"><strong>Name:</strong> {{ $report->name_doc }}</p>

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

                </div>

            @endforeach

        </div>

        <!-- Pagination links -->

        <div class="mt-4 justify-center ml-8 mr-8 mb-4">

            {{ $reports->links() }}

        </div>

    </div>

</x-app-layout>
