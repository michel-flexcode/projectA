<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="bg-[#1A1C24] p-6 w-full max-w-screen-lg">
            <h2 class="text-white font-bold text-xl text-center">Consultant Details</h2>

            <div class="mt-4 bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="mb-4">
                    <label class="block text-white" for="name">Name:</label>
                    <p class="text-gray-300">{{ $consultant->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="company">Company:</label>
                    <p class="text-gray-300">{{ $consultant->company }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="role">Role:</label>
                    <p class="text-gray-300">{{ $consultant->role }}</p>
                </div>
            </div>

            <div class="flex justify-center mt-4">
                <a href="{{ route('sidebarpages.consultants') }}"
                    class="bg-[#4B5563] text-white px-4 py-2 rounded hover:bg-[#374151] transition duration-300">Back
                    to Consultants</a>
            </div>
        </div>
    </div>
</x-app-layout>
