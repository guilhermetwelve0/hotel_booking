<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Room Info') }}<i class="fa-solid fa-dungeon ms-3"></i>
        </h2>
    </x-slot>
        <div class="relative min-h-screen">
            <button data-drawer-target="room_info_sidebar" data-drawer-toggle="room_info_sidebar" aria-controls="room_info_sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
            <aside id="room_info_sidebar" class="h-full absolute top-0 left-0 z-40 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-primary">
                    <ul class="space-y-2 font-medium">
                        <li>
                            @include('components.sidebar-links',["sidebar_route"=>"room-info.room-type",
                                                                "name"=>"Room Types",
                                                                "icon"=>"fa-tags"])
                        </li>
                        <li>
                            @include('components.sidebar-links',["sidebar_route"=>"room-info.service-facility",
                                                                "name"=>"Services & Facilities",
                                                                "icon"=>"fa-bell-concierge"])
                        </li>
                        <li>
                            @include('components.sidebar-links',["sidebar_route"=>"room-info.room",
                                                                "name"=>"Rooms",
                                                                "icon"=>"fa-door-closed"])
                        </li>
                        <li>
                            @include('components.sidebar-links',["name"=>"Branches",
                                                                    "icon"=>"fa-sitemap",
                                                                    "disabled"=>true])
                        </li>
                        <li>
                            @include('components.sidebar-links',["name"=>"Buildings",
                                                                "icon"=>"fa-building",
                                                                "disabled"=>true])
                        </li>
                    </ul>
                </div>
            </aside>
            <section class="room-info-section p-5 sm:p-10">
                @yield('content')
            </section>
        </div>
</x-app-layout>
