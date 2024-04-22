<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master</title>
    @vite('resources/css/app.css')
    <style>
        html{
            scroll-behavior: smooth
        }
    </style>

    <!--Link a iconos gratis gracias a https://fontawesome.com/ -->


</head>



<body class="bg-black text-white antialiased">
    <div class="max-w-screen-lg mx-auto">
        @include('/includes/nav')
        <main class="mt-20">

            <div class="bg-neutral-800 bg-opacity-80 h-auto rounded-lg py-6 sm:py-8 lg:py-12">

        @yield('main')
            </div>
        </main>


        @include('/includes/footer')
    </div>

</body>

</html>
