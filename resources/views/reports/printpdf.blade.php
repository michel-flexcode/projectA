<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
        }
        .text-center {
            text-align: center;
        }
        .text-white {
            color: white;
        }
        .bg-gray-800 {
            background-color: #2d3748;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4 text-center">Report Details</h1>
        <div class="bg-gray-800 rounded-lg p-6 text-white text-center">
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
</body>
</html>
