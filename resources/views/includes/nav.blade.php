<header
    class="sticky top-0 z-50 backdrop-blur  py-5 bg-white/50  flex justify-center items-center w-screen mx-auto px-4">
<div class="flex flex-row max-w-screen-lg mx-auto">
    <a href="{{ route('inicio-show') }}"><img class="w-96" src="../images/logo-negro.png" alt="Logo"></a>
    <nav class="space-x-4 text-base flex flex-row justify-center items-center">
        <a href="{{ route('inicio-show') }}" class="text-xl text-black">Inicio</a>

        <a href="{{ route('galeria-show') }}" class="text-xl text-black">Galería</a>

        <a href="{{ route('custom-show') }}" class="text-xl text-black">Custom</a>

        <a href="{{ route('sobreNosotros') }}" class="text-xl text-black">Sobre Nosotros</a>

        @if (Route::has('login'))
            <div class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  "
                    >
                        <img class="h-8" src="/images/user.svg" alt="">
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-xl text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  "
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-xl text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  "
                        >
                            Registro
                        </a>
                    @endif
                @endauth
            </div>
        @endif

        <a href="{{ route('carrito.mostrar') }}"><img class="h-8 " src="/images/cart.svg" alt="Carrito de la compra"></a>

</div>

</header>
