@extends('room_info.layout')

@section('title', "Rooms")

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn',['back'=> 'room-info.room.index'])
    </div>
    <div>
        @php
            $route = "room-info.room";
            $fields = [
                'Floor' => [
                    'name' => 'floor',
                    'type' => 'number',
                    'attr' => ['required','autofocus','autocomplete']
                ],
                'Room No' => [
                    'name' => 'room_no',
                    'type' => 'number',
                    'attr' => ['required']
                ],
                'Room Type' => [
                    'name' => 'room_type_id',
                    'type' => 'select',
                    'attr' => ['required'],
                    'select_obj' => $room_types
                ],
            ];
        @endphp
        @if (isset($room))
            @include('components.edit-form', [$fields, $route, 'data' => $room])
        @else
            @include('components.create-form', [$fields, $route])
        @endif
    </div>
@endsection
