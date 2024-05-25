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
    <div class="container mx-auto mt-8 black-bg text-white"> <!-- Ajoutez la classe black-bg et text-white ici -->
        <h1 class="text-2xl font-bold mb-4">List of Companies</h1>

        <ul>
            @foreach ($companies as $company)
                <li>
                    <span class="font-bold">{{ $company->name }}</span><br>
                    <span>Website: <a href="{{ $company->web }}" target="_blank">{{ $company->web }}</a></span><br>
                    <span>Mail Domain: {{ $company->mail_domain }}</span><br>
                    @if ($company->logo)
                        <img src="{{ $company->logo }}" alt="Company Logo" width="100">
                    @else
                        No logo available
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
