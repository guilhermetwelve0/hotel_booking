<nav x-data="{ open: false }" class="bg-primary border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        {{-- <x-application-logo class="block h-9 w-auto fill-current text-secondary" /> --}}
                        {{-- <i class="fa-solid fa-crown text-2xl text-secondary"></i> --}}
                        <img src="{{asset('img/crown.png')}}" alt="crown" width="50px">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('booking.index')" :active="request()->routeIs('booking.*')">
                        {{ __('Reservas') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.*')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contato.index')" :active="request()->routeIs('contato.*')">
                        {{ __('Informações - Contato') }}
                    </x-nav-link>
                    <x-nav-link :href="route('room-info.room-type.index')" :active="request()->routeIs('room-info.*')">
                        {{ __('Informações - Quartos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('setting.index')" :active="request()->routeIs('setting.*') || request()->routeIs('profile.*') ">
                        {{ __('Configurações') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-primary hover:text-secondary focus:outline-none transition ease-in-out duration-150">
                            <div><i class="fa-regular fa-circle-user text-xl me-2"></i>@auth {{Auth::user()->name}} @endauth</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fa-solid fa-user me-3"></i>{{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket me-3"></i>{{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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
            <x-responsive-nav-link :href="route('booking.index')" :active="request()->routeIs('booking.*')">
                {{ __('Booking') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('room-info.room-type.index')" :active="request()->routeIs('room-info.*')">
                {{ __('Room Info') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('setting.index')" :active="request()->routeIs('setting.*') || request()->routeIs('profile.*')">
                {{ __('Setting') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-accent">
            <div class="px-4">
                <div class="font-medium text-base text-accent">@auth{{ Auth::user()->name }}@endauth</div>
                <div class="font-medium text-sm text-white">@auth{{ Auth::user()->email }}@endauth</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>