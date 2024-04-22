<header
    class="sticky top-0 z-50 py-5 bg-gradient-to-r from-slate-900 to-slate-700 rounded-b-lg flex justify-around items-center max-w-screen-lg mx-auto px-4">
    <a href="{{ route('inicio-show') }}"><img class="w-96" src="../images/logo.png" alt="Logo"></a>
    <nav class="space-x-4 text-base flex flex-row justify-center items-center">
        <a href="{{ route('inicio-show') }}" class="text-xl hover:text-black">Inicio</a>

        <a href="{{ route('galeria-show') }}" class="hover:text-black">Galería</a>

        <a href="{{ route('custom-show') }}" class="hover:text-black">Custom</a>

        <a href="{{ route('sobreNosotros-show') }}" class="hover:text-black">Sobre Nosotros</a>

        @if (Route::has('login'))
            <div class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        <img class="h-10" src="/images/user.svg" alt="">
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif

        <a href="{{route('carrito.mostrar')}}"><img class="h-10" src="/images/cart.svg" alt="Carrito de la compra"></a>

</header>
