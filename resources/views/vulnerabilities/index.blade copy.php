<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="grid grid-cols-1 gap-4 p-4 w-full max-w-screen-lg">
            <div class="bg-[#1A1C24] p-6 flex justify-center">
                <h2 class="text-white font-bold text-xl text-center">Listed Vulnerabilities</h2>
            </div>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($vulnerabilities as $vulnerability)
                    <div class="bg-[#1A1C24] p-6 rounded-lg shadow-md flex flex-col justify-between">
                        <div>
                            <h3 class="text-white font-bold text-lg text-center">{{ $vulnerability->name }}</h3>
                            <p class="text-gray-400 mt-2">{{ Str::limit($vulnerability->description, 100) }}</p>
                        </div>
                        <div class="mt-4 flex justify-between items-center space-x-2">
                            <a href="{{ route('vulnerabilities.show', $vulnerability->id) }}"
                                class="bg-blue-400 text-white px-3 py-1 rounded text-center hover:bg-blue-500 transition">View</a>
                            <a href="{{ route('vulnerabilities.edit', $vulnerability->id) }}"
                                class="bg-yellow-400 text-white px-3 py-1 rounded text-center hover:bg-yellow-500 transition">Edit</a>
                            <form action="{{ route('vulnerabilities.destroy', $vulnerability->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-400 text-white px-3 py-1 rounded text-center hover:bg-red-500 transition">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Affichage des liens de pagination -->
            <div class="mt-8">
                {{ $vulnerabilities->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
