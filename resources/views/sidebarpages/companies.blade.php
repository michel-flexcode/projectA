<!-- resources/views/companies/create.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Register a Company</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('company.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2">Company Name:</label>
                <input type="text" name="name" id="name" class="border rounded px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="address" class="block mb-2">Company Address:</label>
                <input type="text" name="address" id="address" class="border rounded px-4 py-2 w-full">
            </div>
            <!-- Ajoutez d'autres champs au besoin -->
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Register Company</button>
            </div>
        </form>
    </div>
</x-app-layout>
