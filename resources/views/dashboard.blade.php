<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="grid grid-cols-2 grid-rows-2 gap-4 p-4 w-full max-w-screen-lg h-screen">
            <div class="bg-[#1A1C24] p-6 flex flex-col items-center space-y-4 h-full">
                <h2 class="text-white font-bold text-xl">Registered companies</h2>
                <div class="flex justify-between w-full text-white">
                    <span class="font-bold">Last registred company:</span>
                    @if ($lastCompany)
                        <span>{{ $lastCompany->name }}</span>
                        <span> {{ $lastCompany->created_at->format('Y-m-d') }}</span>
                    @else
                        <span>No companies recorded yet.</span>
                    @endif
                </div>
                <div class="flex justify-between w-full text-white">
                        <span class="font-bold">Total companies:</span>
                        <span>{{ $totalCompanies }}</span>
                        @if ($lastCompany)
                            <span>{{ $lastCompany->created_at->format('Y-m-d') }}</span>
                        @else
                            <span>N/A</span>
                        @endif
                    </div>
                
                    <a href="{{ route('companies.create') }}"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        + Create a company
                    </a>
                    <a href="{{ route('sidebarpages.companies') }}"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        + Modify a company
                    </a>
                    <a href="{{ route('sidebarpages.companies') }}"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        + Check a company
                    </a>
                    <a href="{{ route('sidebarpages.companies') }}"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        + Delete a company
                    </a>
                
            </div>
            <div class="bg-[#1A1C24] p-6 flex flex-col items-center space-y-4 h-full">
                <h2 class="text-white font-bold text-xl">Listed vulnerabilities</h2>
                <div class="text-white w-full space-y-4">
                    <div class="flex justify-between w-full">
                        <span class="font-bold">Last vulnerability:</span>
                        @if ($lastVulnerability)
                            <span>{{ $lastVulnerability->name }}</span>
                            <span> {{ $lastVulnerability->created_at->format('Y-m-d') }}</span>
                        @else
                            <span>No vulnerabilities recorded yet.</span>
                        @endif
                    </div>
                    <div class="flex justify-between w-full">
                        <span class="font-bold">Total vulnerabilities:</span>
                        <span>{{ $totalVulnerabilities }}</span>
                        @if ($lastVulnerability)
                            <span>{{ $lastVulnerability->created_at->format('Y-m-d') }}</span>
                        @else
                            <span>N/A</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-[#1A1C24] p-6 flex flex-col items-center space-y-4 h-full">
                <h2 class="text-white font-bold text-xl">Report new vulnerability</h2>
                <a href="{{ route('vulnerabilities.create') }}"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Report a vulnerability
                </a>
                <a href="{{ route('sidebarpages.vulnerabilities') }}"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Modify a vulnerability
                </a>
                <a href="{{ route('sidebarpages.vulnerabilities') }}"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Check a vulnerability
                </a>
                <a href="{{ route('sidebarpages.vulnerabilities') }}"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Delete a vulnerability
                </a>
            </div>
            <div class="bg-[#1A1C24] p-6 flex flex-col items-center space-y-2 h-full">
    <h2 class="text-white font-bold text-xl">Our Clients</h2>
    @foreach ($companies->take(6) as $company)
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center space-x-4">
                <img src="{{ asset($company->logo) }}" alt="Logo of {{ $company->name }}" class="h-[36px] w-[36px] rounded-full">
                <div class="text-white">
                    <p class="font-bold text-lg">{{ $company->name }}</p>
                    <p class="text-sm">{{ $company->mail_domain ?? 'Email not provided' }}</p>
                </div>
            </div>
            <div class="text-right text-white">
                @if ($company->lastReport)
                    <p class="text-sm text-white">Last report made on: {{ $company->lastReport->created_at->format('Y-m-d') }}</p>
                @else
                    <p class="text-sm text-white">No reports made yet.</p>
                @endif
            </div>
        </div>
    @endforeach
</div>




        </div>
    </div>
</x-app-layout>
