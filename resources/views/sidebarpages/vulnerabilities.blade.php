<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-white text-center py-2">Liste des Vulnérabilités</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ml-2 mr-2">
            @foreach ($vulnerabilities as $vulnerability)
                <div class="bg-gray-800 rounded-lg p-6 text-white flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-bold mb-2">{{ $vulnerability->name }}</h2>
                        <p class="mb-2">{{ $vulnerability->description }}</p>
                        <p class="mb-2">Solution : {{ $vulnerability->solution }}</p>
                        <p class="mb-2">Level : {{ $vulnerability->level }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Liens de pagination -->
        <div class="mt-4 justify-center ml-8 mr-8 mb-4">
            {{ $vulnerabilities->links() }}
        </div>

    </div>
</x-app-layout>
