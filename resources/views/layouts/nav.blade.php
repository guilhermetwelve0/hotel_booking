<nav x-data="{ open: false }" class="bg-gradient-to-l from-primary bg-green-900">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="shrink-0 flex items-center cinzel-decorative">
                    <a href="{{ route('login') }}" class="flex items-end text-secondary text-xl">
                        {{-- <x-application-logo class="block h-9 w-auto fill-current text-secondary" /> --}}
                        <img src="{{asset('img/crown.png')}}" alt="crown" width="50px" class="me-3">
                        ESC-SISTEMA DE GERENCIAMENTO HOTELEIRO
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('landing')" :active="request()->routeIs('landing')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('room-list')" :active="request()->routeIs('room-list')">
                        {{ __('Rooms') }}
                    </x-nav-link>
                    <x-nav-link :href="route('guest-booking')" :active="request()->routeIs('guest-booking')">
                        {{ __('Booking') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ __('About') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-secondary hover:text-accent hover:bg-transparent focus:outline-none focus:bg-transparent focus:text-secondary transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('landing')" :active="request()->routeIs('landing')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('room-list')" :active="request()->routeIs('room-list')">
                {{ __('Rooms') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('guest-booking')" :active="request()->routeIs('guest-booking')">
                {{ __('Booking') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
