<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Create Report</h1>

        <form method="POST" action="{{ route('reports.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name_doc" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name_doc" id="name_doc" class="form-input mt-1 block w-full" required>
            </div>

            <!-- Ajoute les autres champs ici selon tes besoins -->

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create
                    Report</button>
            </div>
        </form>
    </div>
</x-app-layout>
