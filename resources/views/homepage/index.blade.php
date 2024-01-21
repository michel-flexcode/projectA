<x-guest-layout>

    <div class="flex items-center justify-center h-screen"
        style="background-image: url('{{ asset('storage/backgrounds/HopliteV2.png') }}'); background-size: cover;">

        <div class="text-center text-white">
            <h1 class="text-4xl font-bold mb-4">Bienvenue sur Instameme !</h1>
            <p class="text-lg mb-8">Découvrez et partagez des mèmes hilarants.</p>

            {{-- Formulaire de connexion --}}
            <div class="mt-8">
                <p class="text-lg font-semibold">Connectez-vous pour découvrir plus de contenus !</p>
                {{-- Ajoutez ici le formulaire de connexion --}}
            </div>
        </div>
    </div>

</x-guest-layout>
