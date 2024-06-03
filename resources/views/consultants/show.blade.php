<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="grid grid-cols-1 gap-4 p-4 w-full max-w-screen-lg">
            <div class="bg-[#1A1C24] p-6 flex justify-center">
                <h2 class="text-white font-bold text-xl text-center">Vulnerability Details</h2>
            </div>

            <div class="bg-[#1A1C24] p-6 rounded-lg shadow-md">
                <h3 class="text-white font-bold text-lg text-center">{{ $vulnerability->name }}</h3>
                <p class="text-gray-400 mt-4"><strong>Description:</strong> {{ $vulnerability->description }}</p>
                <p class="text-gray-400 mt-4"><strong>Solution:</strong> {{ $vulnerability->solution }}</p>
                <p class="text-gray-400 mt-4"><strong>Level:</strong> {{ $vulnerability->level }}</p>

                <div class="mt-6 flex justify-between items-center space-x-2">
                    <a href="{{ route('vulnerabilities.edit', $vulnerability->id) }}"
                        class="bg-yellow-400 text-white px-3 py-1 rounded text-center hover:bg-yellow-500 transition">Edit</a>
                    <form action="{{ route('vulnerabilities.destroy', $vulnerability->id) }}" method="POST"
                        class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-400 text-white px-3 py-1 rounded text-center hover:bg-red-500 transition">Delete</button>
                    </form>
                    <a href="{{ route('vulnerabilities.index') }}"
                        class="bg-blue-400 text-white px-3 py-1 rounded text-center hover:bg-blue-500 transition">Back
                        to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
