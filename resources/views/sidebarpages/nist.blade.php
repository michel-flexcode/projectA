<!-- resources/views/nist/index.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Liste des documents NIST</h1>

        <ul>
            @foreach ($nist as $item)
                <li>{{ $item->name_doc }}</li>
                <!-- Afficher d'autres informations sur l'entreprise si nécessaire -->
            @endforeach
        </ul>
    </div>
</x-app-layout>
