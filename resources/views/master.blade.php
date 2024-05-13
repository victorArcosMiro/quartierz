<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quartierz</title>
    @vite('resources/css/app.css')


    <!--Link a iconos gratis gracias a https://fontawesome.com/ -->

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.bunny.net">
   <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@include('layouts.navigation')
<!---->
<body class="bg-gradient-to-r from-neutral-900 to-neutral-800 text-white antialiased">
    <div class="max-w-screen-lg mx-auto">

        <main class="mt-5">

            <div class="mx-auto max-w-screen-2xl md:px-8 backdrop-blur-lg shadow-[rgba(0,_0,_0,_0.24)_0px_3px_8px] overflow-hidden rounded-lg py-6 px-10 sm:px-2">

        @yield('main')
            </div>
        </main>


        @include('/includes/footer')
    </div>


</body>

</html>

