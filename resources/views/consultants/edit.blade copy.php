<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="bg-[#1A1C24] p-6 w-full max-w-screen-lg">
            <h2 class="text-white font-bold text-xl">Edit consultant</h2>

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

            <form action="{{ route('consultants.update', $consultant->id) }}" method="POST" class="mb-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-white" for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $consultant->name }}"
                        class="w-full p-2 mt-2 bg-gray-800 text-white">
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="company">Company</label>
                    <textarea name="company" id="description" class="w-full p-2 mt-2 bg-gray-800 text-white">{{ $consultant->company }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="role">Role</label>
                    <textarea name="role" id="role" class="w-full p-2 mt-2 bg-gray-800 text-white">{{ $consultant->role }}</textarea>
                </div>
                <div class="flex justify-between">
                    <!-- Bouton Update -->
                    <button type="submit" class="bg-[#00B458] text-white px-4 py-2 rounded">Update</button>
                    <!-- Bouton de retour -->
                    <a href="{{ route('sidebarpages.consultants') }}"
                        class="bg-[#4B5563] text-white px-4 py-2 rounded">Back to Consultants</a>
                </div>
            </form>



        </div>
    </div>
</x-app-layout>
