<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="grid grid-cols-1 gap-4 p-4 w-full max-w-screen-lg">
            <div class="bg-[#1A1C24] p-6 flex justify-center">
                <h2 class="text-white font-bold text-xl">Listed Vulnerabilities</h2>
            </div>
            <div class="bg-[#1A1C24] p-6 flex flex-col space-y-4">
                @foreach ($vulnerabilities as $vulnerability)
                    <div class="text-white">{{ $vulnerability->name }}</div>
                    <div class="text-gray-400">{{ $vulnerability->description }}</div>
                    <a href="{{ route('vulnerabilities.show', $vulnerability->id) }}" class="text-blue-400">View</a>
                    <a href="{{ route('vulnerabilities.edit', $vulnerability->id) }}" class="text-yellow-400">Edit</a>
                    <form action="{{ route('vulnerabilities.destroy', $vulnerability->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400">Delete</button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
