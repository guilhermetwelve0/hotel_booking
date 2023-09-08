@extends('room_info.layout')

@section('title', "Room Types")

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn', [
            'name' => 'Room Type',
            'route' => 'room-info.room-type.create',
            'create' => true
        ])
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @php
            $fields = [
                "name" => "Name",
                "price" => "Cost",
                "description" => "Description",
                "thumbnail" => "Thumbnail",
            ];
        @endphp
        @include('components.table', ["records" => $types,
                                        "fields" => $fields,
                                        "route" => "room-info.room-type",
                                        'view' => true])
    </div>
@endsection
