<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen" x-data="{
        screenHeight: 'lg',
        companies: [],
        updateScreenHeight() {
            this.screenHeight = window.innerHeight >= 1024 ? 'lg' : (window.innerHeight >= 768 ? 'md' : 'sm');
        },
        init() {
            this.companies = {{ $companies->toJson() }};
            this.updateScreenHeight();
            window.addEventListener('resize', this.updateScreenHeight.bind(this));
        }
    }" x-init="init()">
        <div class="grid grid-cols-2 grid-rows-2 gap-4 p-4 w-full max-w-screen-lg h-screen">
            <div class="bg-[#1A1C24] p-6 flex flex-col items-center space-y-4 h-full">
                <h2 class="text-white font-bold text-xl">Registered companies</h2>
                <div class="flex justify-between w-full text-white">
                    <span class="font-bold">Last registered company:</span>
                    @if ($lastCompany)
                        <span>{{ $lastCompany->name }}</span>
                        <span>{{ $lastCompany->created_at->format('Y-m-d') }}</span>
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
                            <span>{{ $lastVulnerability->created_at->format('Y-m-d') }}</span>
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
                <template x-for="(company, index) in (screenHeight === 'lg' ? companies.slice(0, 6) : (screenHeight === 'md' ? companies.slice(0, 5) : companies.slice(0, 4)))" :key="index">
                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center space-x-4">
                            <img :src="company.logo" :alt="'Logo of ' + company.name" class="h-[36px] w-[36px] rounded-full">
                            <div class="text-white">
                                <p class="font-bold text-lg" x-text="company.name"></p>
                                <p class="text-sm" x-text="company.mail_domain ?? 'Email not provided'"></p>
                            </div>
                        </div>
                        <div class="text-right text-white">
                            <template x-if="company.lastReport">
                                <p class="text-sm" x-text="'Last report: ' + new Date(company.lastReport.created_at).toLocaleDateString()"></p>
                            </template>
                            <template x-if="!company.lastReport">
                                <p class="text-sm">No reports made yet.</p>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-app-layout>
