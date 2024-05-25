<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">List of NIST</h1>

        <ul>
            @foreach ($nist as $nist)
                <li>{{ $nist->name_doc }}</li>
                <!-- Afficher d'autres informations sur l'entreprise si nécessaire -->
            @endforeach
        </ul>
    </div>
</x-app-layout>
