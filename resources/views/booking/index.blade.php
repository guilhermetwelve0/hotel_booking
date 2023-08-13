@section('title', "Booking List")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Booking List') }}<i class="fa-solid fa-solid fa-book ps-3"></i>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-7 justify-center">
        <div class="flex justify-end items-center">
            @include('components.back-and-create-btn', [
                'custom_name' => 'Make Booking',
                'route' => 'booking.create',
                'create' => true,
                'disabled_back' => true,
                'deleted_at_records' => ["Canceled List", "booking.canceled-list"]
            ])
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @php
                $fields = [
                    'guest' => 'Guest',
                    'rooms' => 'Rooms',
                    'check_in_date' => 'Check In',
                    'check_out_date' => 'Check Out',
                    'type' => 'Registration Type',
                    'total' => 'Total Cost',
                    'status' => 'Status',
                ];
            @endphp
            @include('components.table', [
                'records' => $bookings,
                'fields' => $fields,
                'route' => 'booking',
                'remove_edit_del' => true
            ])
        </div>
    </div>
</x-app-layout>
