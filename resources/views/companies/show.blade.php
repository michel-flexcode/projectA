<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="bg-[#1A1C24] p-6 w-full max-w-screen-lg">
            <h2 class="text-white font-bold text-xl text-center">Company Details</h2>

            <div class="mt-4 bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="mb-4">
                    <label class="block text-white" for="name">Name:</label>
                    <p class="text-gray-300">{{ $company->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="address">Address:</label>
                    <p class="text-gray-300">{{ $company->address }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="web">Website:</label>
                    <p class="text-gray-300">{{ $company->web }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="mail_domain">Mail Domain:</label>
                    <p class="text-gray-300">{{ $company->mail_domain }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="logo">Logo:</label>
                    @if ($company->logo)
                        <img src="{{ $company->logo }}" alt="Logo of {{ $company->name }}"
                            class="w-24 h-24 rounded-full">
                    @else
                        <p class="text-gray-300">No logo available</p>
                    @endif
                </div>
            </div>

            <div class="flex justify-center mt-4">
                <a href="{{ route('sidebarpages.companies') }}"
                    class="bg-[#4B5563] text-white px-4 py-2 rounded hover:bg-[#374151] transition duration-300">Back
                    to companies</a>
            </div>
        </div>
    </div>
</x-app-layout>
