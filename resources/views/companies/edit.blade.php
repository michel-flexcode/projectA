<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="bg-[#1A1C24] p-6 w-full max-w-screen-lg">
            <h2 class="text-white font-bold text-xl">Edit Company</h2>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Formulaire de mise à jour -->
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data"
                class="mb-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-white" for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $company->name }}"
                        class="w-full p-2 mt-2 bg-gray-800 text-white">
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="web">Web</label>
                    <textarea name="web" id="web" class="w-full p-2 mt-2 bg-gray-800 text-white">{{ $company->web }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="mail_domain">Mail Domain</label>
                    <textarea name="mail_domain" id="mail_domain" class="w-full p-2 mt-2 bg-gray-800 text-white">{{ $company->mail_domain }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="address">Address</label>
                    <textarea name="address" id="address" class="w-full p-2 mt-2 bg-gray-800 text-white">{{ $company->address }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="w-full p-2 mt-2 bg-gray-800 text-white">
                </div>
                <div class="flex justify-between">
                    <!-- Bouton Update -->
                    <button type="submit"
                        class="bg-[#00B458] text-white px-4 py-2 rounded hover:bg-[#059E30] transition duration-300">Update</button>
                    <!-- Bouton de retour -->
                    <a href="{{ route('sidebarpages.companies') }}"
                        class="bg-[#4B5563] text-white px-4 py-2 rounded hover:bg-[#374151] transition duration-300">Back
                        to companies</a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
