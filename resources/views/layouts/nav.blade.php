<nav x-data="{ open: false }" class="bg-green-900">
    <!-- Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('login') }}" class="flex items-center text-secondary text-xl">
                    <img src="{{ asset('img/crown.png') }}" alt="crown" width="50px" class="me-3">
                    <span class="font-semibold text-lg">ESC-SISTEMA DE GERENCIAMENTO HOTELEIRO</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-4 sm:flex">
                @foreach ([
                    'landing' => 'Home',
                    'login' => 'Login',
                    'room-list' => 'Quartos',
                    'guest-booking' => 'Reservas',
                    'about' => 'Sobre Nós',
                    'contact' => 'Contato'
                ] as $route => $label)
                    <x-nav-link :href="route($route)" :active="request()->routeIs($route)">
                        {{ __($label) }}
                    </x-nav-link>
                @endforeach
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-secondary hover:text-accent focus:outline-none focus:bg-transparent transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-2">
            @foreach ([
                'landing' => 'Home',
                'login' => 'Login',
                'room-list' => 'Quartos',
                'guest-booking' => 'Reservas',
                'about' => 'Sobre Nós',
                'contact' => 'Contato'
            ] as $route => $label)
                <x-responsive-nav-link :href="route($route)" :active="request()->routeIs($route)">
                    {{ __($label) }}
                </x-responsive-nav-link>
            @endforeach
        </div>
    </div>
</nav>
