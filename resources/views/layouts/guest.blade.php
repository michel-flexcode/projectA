<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">

    {{-- <nav class="flex justify-between items-center py-4 px-8 bg-gray-100">
        <a href="/"
            class="group font-bold text-3xl flex items-center space-x-4 hover:text-emerald-600 transition ">
            <x-application-logo class="w-10 h-10 fill-current text-gray-500 group-hover:text-emerald-500 transition" />
            <span>Eyproject</span>
        </a>

        <div class="flex items-center space-x-4">

            <a href="{{ route('login') }}" class="font-medium text-gray-600 hover:text-gray-500 transition">Logina</a>
            <a href="{{ route('register') }}"
                class="font-medium text-gray-600 hover:text-gray-500 transition">Registera</a>
        </div> --}}
    </nav>

    <main>
        {{ $slot }}
    </main>
    </div>
    </div>
</body>

</html>
