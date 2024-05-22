{{-- <x-app-layout>
    <div class="flex flex-col justify-center h-screen"
        style="background-image: url('{{ asset('storage/backgrounds/HopliteV2.png') }}'); background-size: cover;">
</x-app-layout> --}}

{{-- <x-app-layout> --}}
{{-- <div class="flex flex-col justify-center h-screen" style="background-color: #1A1C24;">
    </div> --}}

{{-- <div class="flex-auto overflow-y-auto" style="background-color: #1A1C24;">

        a
    </div> --}}

{{-- <div>Pannel</div>
    <div>Pannel2</div>
    <div>Pannel3</div>
    <div>Pannel4</div>
</x-app-layout> --}}

<x-app-layout>

    <div class="bg-black flex items-center justify-center min-h-screen">

        <div class="grid grid-cols-2 grid-rows-2 gap-4 p-4 w-full max-w-screen-lg h-screen">
            <div class="bg-[#1A1C24] p-6 flex justify-center h-full">
                <h2 class="text-white font-bold text-xl">Registered companies</h2>
            </div>
            <div class="bg-[#1A1C24] p-6 flex justify-center h-full">
                <h2 class="text-white font-bold text-xl">Listed vulnerabilities</h2>
            </div>
            <div class="bg-[#1A1C24] p-6 flex flex-col justify-center space-y-4 h-full">
                <h2 class="text-white font-bold text-xl">Report new vulnerability</h2>
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Create Report
                </button>
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Create Report
                </button>
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white bg-[#00B458] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    + Create Report
                </button>
            </div>
            <div class="bg-[#1A1C24] p-6 flex justify-center h-full">
                <h2 class="text-white font-bold text-xl">Our clients</h2>
            </div>
        </div>

    </div>
</x-app-layout>
