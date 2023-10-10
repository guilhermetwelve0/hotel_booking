@extends('room_info.layout')

@section('title', "Quartos")

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn',['back'=> 'room-info.room.index'])
    </div>
    <div>
        @php
            $route = "room-info.room";
            $fields = [
                'Andar' => [
                    'name' => 'floor',
                    'type' => 'number',
                    'attr' => ['required','autofocus','autocomplete']
                ],
                'N° do Quarto' => [
                    'name' => 'room_no',
                    'type' => 'number',
                    'attr' => ['required']
                ],
                'Tipo de Quarto' => [
                    'name' => 'room_type_id',
                    'type' => 'select',
                    'attr' => ['required'],
                    'select_obj' => $room_types
                ],
                'Serviços e Facilidades' => [
                    'name' => 'services_facilities',
                    'type' => 'select',
                    'multiple' => true,
                    'attr' => [],
                    'select_obj' => $services_facilities
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
