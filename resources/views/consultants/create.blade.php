<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="bg-[#1A1C24] p-6 w-full max-w-screen-lg">
            <h2 class="text-white font-bold text-xl text-center">Create New Consultant</h2>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Message de succès -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('consultants.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-white" for="name">Name</label>
                    <input type="text" name="name" id="name" class="w-full p-2 mt-2 bg-gray-800 text-white">
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="company">Company</label>
                    <textarea name="company" id="company" class="w-full p-2 mt-2 bg-gray-800 text-white"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="role">Role</label>
                    <textarea name="role" id="role" class="w-full p-2 mt-2 bg-gray-800 text-white"></textarea>
                </div>
                <div class="flex justify-between">
                    <!-- Submit button -->
                    <button type="submit"
                        class="bg-[#00B458] text-white px-4 py-2 rounded hover:bg-[#059E30] transition duration-300">Submit</button>
                    <!-- Back button -->
                    <a href="{{ route('sidebarpages.consultants') }}"
                        class="bg-[#4B5563] text-white rounded hover:bg-[#374151] transition duration-300 inline-block mt-2 md:mt-0 md:ml-4 px-4 py-2">Back
                        to Consultants</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
