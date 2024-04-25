<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gradient-to-r from-violet-600 to-indigo-600 text-white antialiased">
        @include('layouts.navigation')



        <!-- Page Content -->
        <div class="max-w-screen-lg mx-auto">

            <main class="mt-5">
                {{ $slot }}
            </main>
        </div>
        <!-- Page Heading -->
        @if (isset($header))
            <header class="">
                <div class="max-w-screen-lg mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
    </div>
</body>

</html>
