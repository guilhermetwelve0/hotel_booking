@extends('room_info.layout')

@section('title', "Quartos")

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn', [
            'name' => 'Quarto',
            'route' => 'room-info.room.create',
            'create' => true
        ])
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @php
            $fields = [
                "room_no" => "N° do Quarto",
                "floor" => "Andar",
                "roomType" => "Tipo de Quarto",
                "service_facility" => "Serviços e Facilidades"
            ];
        @endphp
        @include('components.table', ["records" => $rooms,
                                        "fields" => $fields,
                                        "route" => "room-info.room"])
    </div>
@endsection
