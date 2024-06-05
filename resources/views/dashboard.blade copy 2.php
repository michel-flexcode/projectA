<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="grid grid-cols-2 grid-rows-2 gap-4 p-4 w-full max-w-screen-lg h-screen">
            <div class="bg-[#1A1C24] p-6 flex justify-center h-full">
                <h2 class="text-white font-bold text-xl">Registered companies</h2>
            </div>
            <div class="bg-[#1A1C24] p-6 flex flex-col items-center space-y-4 h-full">
                <h2 class="text-white font-bold text-xl">Listed vulnerabilities</h2>
                <div class="text-white w-full">
                    <div class="flex justify-between">
                        <h3 class="font-bold">Last vulnerability:</h3>
                        @if ($lastVulnerability)
                            <p>{{ $lastVulnerability->name }} ({{ $lastVulnerability->created_at->format('Y-m-d') }})
                            </p>
                        @else
                            <p>No vulnerabilities recorded yet.</p>
                        @endif
                    </div>
                    <div class="flex justify-between mt-4">
                        <h3 class="font-bold">Total vulnerabilities:</h3>
                        <p>{{ $totalVulnerabilities }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-[#1A1C24] p-6 flex flex-col items-center space-y-4 h-full">
                <h2 class="text-white font-bold text-xl">Report new vulnerability</h2>
                <a href="{{ route('vulnerabilities.create') }}"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Report a vulnerability
                </a>
                <a href="{{ route('vulnerabilities.index') }}"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Modify a vulnerability
                </a>
                <a href="{{ route('vulnerabilities.index') }}"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Check a vulnerability
                </a>
                <a href="{{ route('vulnerabilities.index') }}"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Delete a vulnerability
                </a>
            </div>
            <div class="bg-[#1A1C24] p-6 flex justify-center h-full">
                <h2 class="text-white font-bold text-xl">Our clients</h2>
            </div>
        </div>
    </div>
</x-app-layout>
