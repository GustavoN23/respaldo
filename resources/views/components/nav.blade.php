<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 p-4 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-2">
        <div class="flex justify-between h-16">
            <div class="flex gap-48">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-14 md:-my-px md:ms-10 md:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" >
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('pages.nosotros')" :active="request()->routeIs('pages.nosotros')">
                        {{ __('Nosotros') }}
                    </x-nav-link>
                    <x-nav-link :href="route('pages.contactanos')" :active="request()->routeIs('pages.contactanos')">
                        {{ __('Contactanos') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:flex md:items-center md:ms-6 gap-5">
                {{--? permite valor nulo y no da error si el usuario no esta auth--}}
                @if (Route::has('login'))
                    <div class="sm:top-0 mt-3 sm:right-0 p-6 text-right z-10">
                        @auth
                            @if (auth()->user()->rol === 1)
                                <a href="{{ url('/personas') }}" class="font-semibold text-green-600 hover:text-green-700 
                                bg-green-100 hover:bg-green-200 py-3 px-2 rounded-md shadow-md uppercase">
                                    Inicio personas
                                </a>
                            @elseif (auth()->user()->rol === 2)
                                <a href="{{ url('/mascotas') }}" class="font-semibold text-orange-600 hover:text-orange-700 
                                bg-orange-100 hover:bg-orange-200 py-3 px-2 rounded-md shadow-md uppercase">
                                    Inicio mascotas
                                </a>
                            @elseif (auth()->user()->rol === 3)
                                <a href="{{ url('/dashboard') }}" class="font-semibold text-blue-600 hover:text-blue-700 
                                bg-blue-100 hover:bg-blue-200 py-3 px-2 rounded-md shadow-md uppercase">
                                    Dashboard
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow-md mr-3">
                                Inicia sesión
                            </a> 
                            @if (Route::has('register'))                    
                                <a href="{{ route('register') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md shadow-md">
                                    Crea tu cuenta
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-black hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out bg-gray-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pages.nosotros')" :active="request()->routeIs('pages.nosotros')">
                {{ __('Nosotros') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pages.contactanos')" :active="request()->routeIs('pages.contactanos')">
                {{ __('Contacranos') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('login')" class="text-blue-500 bg-blue-100 border-blue-800 flex gap-1">
                    {{ __('Iniciar sesion') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" class="text-green-700 bg-green-100 border-green-700 flex gap-1">
                    {{ __('Crea tu cuenta') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </div>
</nav>