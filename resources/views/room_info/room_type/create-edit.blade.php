@extends('room_info.layout')

@section('title', "Room Types")

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn',['back'=> 'room-info.room-type.index'])
    </div>
    <div>
        @php
            $route = "room-info.room-type";
            $fields = [
                'Thumbnail' => [
                    'name' => 'thumbnail',
                    'type' => 'file',
                    'attr' => ['required']
                ],
                'Name' => [
                    'name' => 'name',
                    'attr' => ['required','autofocus','autocomplete']
                ],
                'Price' => [
                    'name' => 'price',
                    'attr' => []
                ],
                'Description' => [
                    'name' => 'description',
                    'type' => 'textarea',
                    'attr' => []
                ],
            ];
        @endphp
        @if (isset($roomType))
            @include('components.edit-form', [$fields, $route, 'data' => $roomType])
        @else
            @include('components.create-form', [$fields, $route])
        @endif
    </div>
@endsection
