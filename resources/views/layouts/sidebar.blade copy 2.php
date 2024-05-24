<div class="w-64 text-white" style="background-color: #1A1C24;">
    <div class="shrink-0 flex items-center mt-2 h-16 mx-4">
        <a href="{{ route('dashboard') }}" class="h-full">
            <x-application-logo class="block h-full w-auto fill-current text-gray-600" />
        </a>
    </div>
    <ul class="my-4 mx-4">
        <li class="flex items-center">
            <span class="inline-block w-2.5 h-2.5 bg-gray-500 rounded-full mr-3"></span>
            <a href="#home" class="block py-2">Dashboard</a>
        </li>
        <li class="flex items-center">
            <div class="bg-[#1A1C24] p-6 flex justify-center items-center h-full">
                <a href="{{ route('sidebarpages.vulnerabilities') }}" class="text-white font-bold text-xl">Listed
                    Vulnerabilities</a>
            </div>
        </li>
        <li class="flex items-center">
            <div class="bg-[#1A1C24] p-6 flex justify-center items-center h-full">
                <a href="{{ route('sidebarpages.companies') }}" class="text-white font-bold text-xl">Listed
                    Registered companies</a>
            </div>
        </li>
        <li class="flex items-center">
            <span class="inline-block w-2.5 h-2.5 bg-gray-500 rounded-full mr-3"></span>
            <a href="#reports" class="block py-2">Reports</a>
        </li>
        <li class="flex items-center">
            <span class="inline-block w-2.5 h-2.5 bg-gray-500 rounded-full mr-3"></span>
            <a href="#nist" class="block py-2">NIST</a>
        </li>
    </ul>
</div>

<footer class="w-64 text-left p-4 text-white font-roboto fixed bottom-0">
    <p class="mr-[2%]">Legal Mentions</p>
</footer>
