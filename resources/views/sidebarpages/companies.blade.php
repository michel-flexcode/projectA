<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="grid grid-cols-1 gap-4 p-4 w-full max-w-screen-lg">
            <div class="bg-[#1A1C24] p-6 flex justify-center">
                <h2 class="text-white font-bold text-xl text-center">List of companies</h2>
            </div>

            <div class="flex justify-between mb-4">
                <!-- Bouton Add Company -->
                <a href="{{ route('companies.create') }}"
                    class="bg-[#00B458] text-white px-4 py-2 rounded hover:bg-[#059E30] transition duration-300">Add
                    Company</a>
                <!-- Bouton SearchBar -->
                <form method="GET" action="{{ route('sidebarpages.companies') }}" class="flex">
                    <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Search Companies:"
                        class="px-2 py-1 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
                    <button type="submit"
                        class="px-2 py-1 bg-[#0086F4] text-white rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 15l4.85 4.85M10 18a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                    </button>
                </form>


                <!-- Bouton Back to Dashboard -->
                <a href="{{ route('dashboard') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Back
                    to
                    Dashboard</a>
            </div>

            <!-- Affichage des companies -->
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($companies as $company)
                        <div class="bg-[#1A1C24] p-6 rounded-lg shadow-md flex flex-col justify-between">
                            <div>
                                <h3 class="text-white font-bold text-lg text-center">{{ $company->name }}</h3>
                                <p class="text-gray-400 mt-2">{{ Str::limit($company->web, 100) }}</p>
                                <p class="text-gray-400 mt-2">{{ $company->mail_domain }}</p>
                                <p class="text-gray-400 mt-2">{{ $company->address }}</p>
                            </div>
                            <div class="mt-4 flex justify-center items-center">
                                @if ($company->logo)
                                    <img src="{{ $company->logo }}" alt="Logo of company : {{ $company->name }}"
                                        class="w-24 h-24 rounded-full">
                                @else
                                    <p class="text-gray-400">No logo available</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-4 justify-center">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
