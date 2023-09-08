
@extends('layouts.main')

@section('title', 'Booking List')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <header class="bg-gradient-to-b from-primary to-[#0001] py-20 text-white text-center">
        <div class="container mx-auto">
            <h1 class="text-4xl font-semibold mb-4">Welcome, {{$guest->name}}</h1>
            <p class="text-lg text-secondary">Your Booking List</p>
        </div>
    </header>

    <section class="py-16">
        <div class="container relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-100">
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
                'route' => 'booking',
                'remove_edit_del' => true
            ])
        </div>
        <div class="flex justify-end py-3">
            <a href="{{route('change-guest')}}" class="text-white hover:text-blue-500 hover:underline">Change Guest <i class="fa-solid fa-right-from-bracket fa-lg mx-3"></i></a>
        </div>
    </section>
</div>
@endsection
