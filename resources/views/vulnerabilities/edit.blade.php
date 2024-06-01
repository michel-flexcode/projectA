<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="bg-[#1A1C24] p-6 w-full max-w-screen-lg">
            <h2 class="text-white font-bold text-xl">Edit Vulnerability</h2>
            <form action="{{ route('vulnerabilities.update', $vulnerability->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-white" for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $vulnerability->name }}"
                        class="w-full p-2 mt-2 bg-gray-800 text-white">
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="description">Description</label>
                    <textarea name="description" id="description" class="w-full p-2 mt-2 bg-gray-800 text-white">{{ $vulnerability->description }}</textarea>
                </div>
                <button type="submit" class="bg-[#00B458] text-white px-4 py-2 rounded">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
