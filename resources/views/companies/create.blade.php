<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="bg-[#1A1C24] p-6 w-full max-w-screen-lg">
            <h2 class="text-white font-bold text-xl text-center">Create New Company</h2>

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

            <form action="{{ route('companies.store') }}" method="POST" class="mb-4" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-white" for="name">Name</label>
                    <input type="text" name="name" id="name" class="w-full p-2 mt-2 bg-gray-800 text-white">
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="web">Web</label>
                    <input type="url" name="web" id="web" class="w-full p-2 mt-2 bg-gray-800 text-white">
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="mail_domain">Mail Domain</label>
                    <input type="text" name="mail_domain" id="mail_domain"
                        class="w-full p-2 mt-2 bg-gray-800 text-white">
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="address">Address</label>
                    <input type="text" name="address" id="address" class="w-full p-2 mt-2 bg-gray-800 text-white">
                </div>
                <div class="mb-4">
                    <label class="block text-white" for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="w-full p-2 mt-2 bg-gray-800 text-white">
                </div>
                <div class="flex justify-between">
                    <button type="submit"
                        class="bg-[#00B458] text-white px-4 py-2 rounded hover:bg-[#059E30] transition duration-300">Submit</button>
                    <a href="{{ route('sidebarpages.companies') }}"
                        class="bg-[#4B5563] text-white rounded hover:bg-[#374151] transition duration-300 inline-block mt-2 md:mt-0 md:ml-4 px-4 py-2">Back
                        to Companies</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
