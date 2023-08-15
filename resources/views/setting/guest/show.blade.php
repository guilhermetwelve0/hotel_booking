@section('title', $guest->name . "'s Bookings")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ $guest->name . "'s Bookings" }}<i class="fa-solid fa-bookmark ps-3"></i>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 justify-center">
        <div class="flex justify-between items-center p-4">
            @include('components.back-and-create-btn', [
                'name' => 'Guest',
                'route' => 'setting.guest.create',
                'back' => 'setting.guest.index',
            ])
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @php
                $fields = [
                    'rooms' => 'Rooms',
                    'check_in_date' => 'Check In',
                    'check_out_date' => 'Check Out',
                    'type' => 'Registration Type',
                    'total' => 'Total Cost',
                    'status' => 'Status',
                ];
            @endphp
            @include('components.table', [
                'records' => $guest->bookings,
                'fields' => $fields,
                'route' => 'setting.guest',
                'remove_edit_del' => true
            ])
        </div>
    </div>
</x-app-layout>
