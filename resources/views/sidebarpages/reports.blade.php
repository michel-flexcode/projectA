<x-app-layout>
    <div class="container mx-auto mt-8 text-white">
        <h1 class="text-2xl font-bold mb-4">List of Reports</h1>

        <ul>
            @foreach ($reports as $report)
                <li>
                    <strong>Company ID:</strong> {{ $report->company_id }}<br>
                    <strong>Name:</strong> {{ $report->name_doc }}<br>
                    <strong>Vulnerabilities:</strong> {{ $report->vulnerabilities }}<br>
                    <strong>State:</strong> {{ $report->state }}<br>
                    <strong>Date:</strong> {{ $report->date }}<br>
                    <strong>Recommendations:</strong> {{ $report->recommendations }}<br>
                    <strong>Proposals:</strong> {{ $report->proposals }}<br>
                    <strong>Conclusions:</strong> {{ $report->conclusions }}<br>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
