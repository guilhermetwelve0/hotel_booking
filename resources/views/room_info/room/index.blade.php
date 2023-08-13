@extends('room_info.layout')

@section('title', "Rooms")

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn', [
            'name' => 'Room',
            'route' => 'room-info.room.create',
            'create' => true
        ])
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @php
            $fields = [
                "room_no" => "Room No",
                "floor" => "Floor",
                "roomType" => "Room Type",
                "service_facility" => "Services & Facilities"
            ];
        @endphp
        @include('components.table', ["records" => $rooms,
                                        "fields" => $fields,
                                        "route" => "room-info.room"])
    </div>
@endsection
