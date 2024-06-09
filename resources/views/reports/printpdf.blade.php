<x-app-layout>
    <div class="container mx-auto mt-8 text-white">
        <h1 class="text-2xl font-bold mb-4 text-center">Report Details</h1>

        <div class="bg-gray-800 rounded-lg p-6 text-white">
            <h2 class="text-xl font-bold mb-2">{{ $report->name_doc }}</h2>

            <p><strong>Company:</strong> {{ $report->company->name }}</p>

            <p><strong>Vulnerabilities:</strong> 
                @foreach (explode(',', $report->vulnerabilities) as $vulnerability)
                    {{ \App\Models\Vulnerability::find($vulnerability)->name }}@if (!$loop->last), @endif
                @endforeach
            </p>

            <p><strong>Consultants:</strong> 
                @foreach (explode(',', $report->consultants) as $consultantId)
                    {{ \App\Models\Consultant::find($consultantId)->name }}@if (!$loop->last), @endif
                @endforeach
            </p>

            <p><strong>State:</strong> {{ $report->state }}</p>
            <p><strong>Date:</strong> {{ $report->date }}</p>
            <p><strong>Recommendations:</strong> {{ $report->recommendations }}</p>
            <p><strong>Proposals:</strong> {{ $report->proposals }}</p>
            <p><strong>Conclusions:</strong> {{ $report->conclusions }}</p>
        </div>
    </div>
</x-app-layout>
