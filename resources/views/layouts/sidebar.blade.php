<div class="w-64 text-white" style="background-color: #1A1C24;">
    <div class="shrink-0 flex items-center mt-2 h-16 mx-4">
        <a href="{{ route('dashboard') }}" class="h-full">
            <x-application-logo class="block h-full w-auto fill-current text-gray-600" />
        </a>
    </div>
    <ul class="my-4 mx-4">
        <li class="flex items-center">
            <span class="inline-block w-2.5 h-2.5 bg-gray-500 rounded-full mr-3"></span>
            <a href="{{ route('dashboard') }}" class="block py-2">
                Dashboard</a>
        </li>
        <li class="flex items-center">
            <span class="inline-block w-2.5 h-2.5 bg-gray-500 rounded-full mr-3"></span>
            <a href="{{ route('sidebarpages.vulnerabilities') }}" class="block py-2">Listed
                Vulnerabilities</a>
        </li>
        <li class="flex items-center">
            <span class="inline-block w-2.5 h-2.5 bg-gray-500 rounded-full mr-3"></span>
            <a href="{{ route('sidebarpages.companies') }}" class="block py-2">Listed
                Registered companies</a>
        </li>
        <li class="flex items-center">
            <span class="inline-block w-2.5 h-2.5 bg-gray-500 rounded-full mr-3"></span>
            <a href="{{ route('sidebarpages.reports') }}" class="block py-2">Reports</a>
        </li>
        <li class="flex items-center">
            <span class="inline-block w-2.5 h-2.5 bg-gray-500 rounded-full mr-3"></span>
            <a href="{{ route('sidebarpages.nist') }}" class="block py-2">NIST</a>
        </li>

        <li class="flex items-center">
            <span class="inline-block w-2.5 h-2.5 bg-gray-500 rounded-full mr-3"></span>
            <a href="{{ route('sidebarpages.consultants') }}" class="block py-2">Consultants</a>
        </li>
    </ul>
</div>

<footer class="w-64 text-left p-4 text-white font-roboto fixed bottom-0">
    <p class="mr-[2%]">Legal Mentions</p>
</footer>
