<nav x-data="{ open: false }" class="sticky top-0 z-50 backdrop-blur bg-white/50 w-screen mx-auto">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex py-6 max-w-screen-lg mx-auto justify-between pr-5">
            <div class="flex max-w-60">
                <!-- Logo -->
                <a class="mr-auto" href="{{ route('inicio-show') }}"><img src="../images/logo-negro.png" alt="Logo"></a>
                <!-- Navigation Links -->
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:flex md:items-center sm:ms-6 justify-between gap-6">
                <nav class="space-x-4 text-base flex flex-row justify-center gap-3 items-center ml-auto">
                    <a href="{{ route('galeria-show') }}" class="text-base text-black hover:text-white">Galería</a>
                    <a href="{{ route('sobreNosotros') }}" class="text-base text-black hover:text-white">Sobre Nosotros</a>
                </nav>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            @if (Auth::user()->is_admin)
                            <x-responsive-nav-link :href="route('pedido-telefono')">
                                <div class="text-black">{{ __('Pedidos por teléfono') }}</div>
                            </x-responsive-nav-link>

                            <x-responsive-nav-link :href="route('user')">
                                <div class="text-black">{{ __('Gestion de usuarios.') }}</div>
                            </x-responsive-nav-link>
                        @endif

                            <x-dropdown-link :href="route('historial-pedidos')">
                                {{ __('Historial de pedidos') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="ml-4">
                        <a href="{{ route('login') }}" class="text-base hover:text-white text-black">Login</a>
                    </div>
                    <div class="ml-4">
                        <a href="{{ route('register') }}" class="text-base hover:text-white text-black">Registro</a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-black dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mr-4">
                <a href="{{ route('carrito.mostrar') }}"><img class="inline-flex items-center justify-center p-2 rounded-md text-black hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out min-w-10 max-w-10" src="/images/cart.svg" alt="Carrito de la compra"></a>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="space-y-1 flex flex-col items-start ">
            <!-- Duplicate Navigation Links Here -->
            <a href="{{ route('inicio-show') }}" class="pt-2 pb-3 px-4 text-base text-black w-full hover:bg-white">Inicio</a>
            <a href="{{ route('galeria-show') }}" class="pt-2 pb-3 px-4 text-base text-black w-full hover:bg-white">Galería</a>
            <a href="{{ route('sobreNosotros') }}" class="pt-2 pb-3 px-4 text-base text-black w-full hover:bg-white ">Sobre Nosotros</a>
            <!-- End of Duplicate Navigation Links -->
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                @auth
                    <div class="font-medium text-base text-black">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-black">{{ Auth::user()->email }}</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                @auth
                    <x-responsive-nav-link :href="route('profile.edit')">
                        <div class="text-black"> {{ __('Perfil') }}</div>
                    </x-responsive-nav-link>

                    @if (Auth::user()->is_admin)
                        <x-responsive-nav-link :href="route('pedido-telefono')">
                            <div class="text-black">{{ __('Pedidos por teléfono') }}</div>
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('user')">
                            <div class="text-black">{{ __('Gestion de usuarios.') }}</div>
                        </x-responsive-nav-link>
                    @endif

                    <x-responsive-nav-link :href="route('historial-pedidos')">
                        <div class="text-black">{{ __('Historial de pedidos') }}</div>
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            <div class="text-black">
                                {{ __('Cerrar sesión') }}
                            </div>
                        </x-responsive-nav-link>
                    </form>
                @else
                    <div class="space-y-1 flex flex-col items-start">
                        <a href="{{ route('login') }}" class="pt-2 pb-3 px-4 text-base text-black w-full hover:bg-white">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="pt-2 pb-3 px-4 text-base text-black w-full hover:bg-white">Registro</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
