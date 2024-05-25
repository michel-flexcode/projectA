{{-- <x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Register a Company</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-2">Company Name:</label>
                <input type="text" name="name" id="name" class="border rounded px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="address" class="block mb-2">Company Address:</label>
                <input type="text" name="address" id="address" class="border rounded px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="web" class="block mb-2">Company Website:</label>
                <input type="text" name="web" id="web" class="border rounded px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="mail_domain" class="block mb-2">Mail Domain:</label>
                <input type="text" name="mail_domain" id="mail_domain" class="border rounded px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="logo" class="block mb-2">Company Logo:</label>
                <input type="file" name="logo" id="logo" class="border rounded px-4 py-2 w-full">
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Register Company</button>
            </div>
        </form>
    </div>
</x-app-layout> --}}

<!-- resources/views/sidebarpages/companies.blade.php -->

<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-white text-center py-2">List of registered companies</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ml-2 mr-2">
            @foreach ($companies as $company)
                <div class="bg-gray-800 rounded-lg p-6 text-white">
                    <h2 class="text-xl font-bold mb-2">{{ $company->name }}</h2>
                    <p class="mb-2">Website : <a href="{{ $company->web }}" class="text-blue-400"
                            target="_blank">{{ $company->web }}</a></p>
                    <p class="mb-2">Mail : {{ $company->mail_domain }}</p>
                    @if ($company->logo)
                        <img src="{{ $company->logo }}" alt="Logo of company : {{ $company->name }}"
                            class="w-24 h-24 rounded-full mx-auto">
                    @else
                        <p>No logo available</p>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Liens de pagination -->
        {{ $companies->links() }}
    </div>
</x-app-layout>
