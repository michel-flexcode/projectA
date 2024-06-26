<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="grid grid-cols-1 gap-4 p-4 w-full max-w-screen-lg">
            <div class="bg-[#1A1C24] p-6 flex justify-center">
                <h2 class="text-white font-bold text-xl text-center">List of Consultants</h2>
            </div>

            <div class="flex justify-between mb-4">
                <!-- Bouton Create Consultant -->
                <a href="{{ route('consultants.create') }}"
                    class="bg-[#00B458] text-white px-4 py-2 rounded hover:bg-[#059E30] transition duration-300">Create
                    Consultant</a>
                <!-- Bouton SearchBar -->
                <form method="GET" action="{{ route('sidebarpages.consultants') }}" class="flex">
                    <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Search Consultants:"
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

            <!-- Affichage des consultants -->
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($consultants as $consultant)
                        <div class="bg-[#1A1C24] p-6 rounded-lg shadow-md flex flex-col justify-between">
                            <div>
                                <h3 class="text-white font-bold text-lg text-center">{{ $consultant->name }}</h3>
                                <p class="text-gray-400 mt-2">{{ Str::limit($consultant->company, 100) }}</p>
                                <p class="text-gray-400 mt-2">{{ Str::limit($consultant->role, 100) }}</p>
                            </div>
                            <div class="mt-4 flex justify-between items-center space-x-2">
                                <a href="{{ route('consultants.show', $consultant->id) }}"
                                    class="bg-blue-400 text-white px-3 py-1 rounded text-center hover:bg-blue-500 transition">View</a>
                                <a href="{{ route('consultants.edit', $consultant->id) }}"
                                    class="bg-yellow-400 text-white px-3 py-1 rounded text-center hover:bg-yellow-500 transition">Edit</a>
                                <form action="{{ route('consultants.destroy', $consultant->id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this consultant?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-400 text-white px-3 py-1 rounded text-center hover:bg-red-500 transition">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Pagination -->
            {{ $consultants->links() }}

        </div>
    </div>
</x-app-layout>
