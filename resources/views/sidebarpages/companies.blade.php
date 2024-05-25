<!-- resources/views/sidebarpages/companies.blade.php -->

<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-white text-center py-2">List of registered companies</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ml-2 mr-2">
            @foreach ($companies as $company)
                <div class="bg-gray-800 rounded-lg p-6 text-white flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-bold mb-2">{{ $company->name }}</h2>
                        <p class="mb-2">Website : <a href="{{ $company->web }}" class="text-blue-400"
                                target="_blank">{{ $company->web }}</a></p>
                        <p class="mb-2">Mail : {{ $company->mail_domain }}</p>
                    </div>
                    <div class="flex justify-center">
                        @if ($company->logo)
                            <img src="{{ $company->logo }}" alt="Logo of company : {{ $company->name }}"
                                class="w-24 h-24 rounded-full">
                        @else
                            <p>No logo available</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Liens de pagination -->
        <div class="mt-4 justify-center ml-8 mr-8 mb-4">
            {{ $companies->links() }}
        </div>

    </div>
</x-app-layout>
