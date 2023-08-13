<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
           {{ __('Setting') }}<i class="fa-solid fa-gear ps-3"></i>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 gap-4 py-10 justify-center">
        @php
            $settings = [
                "Admin Users' Setting" => [
                    "icon" => "fa-solid fa-users-gear",
                    "route" => "setting.user.index",
                    "summary" => "List of Administration Users, Add new account, Edit User Information and Delete Accounts.",
                ],
                "Guest List" => [
                    "icon" => "fa-solid fa-users-viewfinder",
                    "route" => "setting.guest.index",
                    "summary" => "List of Guests, Add new Guest, Edit Guest Information and Delete guests.",
                ],
                "Website Setting" => [
                    "icon" => "fa-solid fa-sliders",
                    "route" => "landing",
                    "summary" => "Website Banner Images, Contact Emails, Phone Numbers and Other Informations.",
                    "disabled" => true
                ],
                "VIP Guests" => [
                    "icon" => "fa-regular fa-star",
                    "route" => "landing",
                    "summary" => "Set VIP Member Guests to imporove Customer Management Services.",
                    "disabled" => true,
                ],
            ]
        @endphp

        @foreach ($settings as $title => $setting)
            @include('components.setting-card', [
                "title" => $title,
                "icon" => $setting['icon'],
                "route" => $setting['route'],
                "summary" => $setting['summary'],
                "disabled" => $setting['disabled'] ?? false,
            ])
        @endforeach
    </div>
</x-app-layout>
