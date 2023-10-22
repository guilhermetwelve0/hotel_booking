@extends('room_info.layout')

@section('title', "Tipos de Quartos")

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn', [
            'name' => 'Tipo de Quarto',
            'route' => 'room-info.room-type.create',
            'create' => true
        ])
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @php
            $fields = [
                "name" => "Nome",
                "price" => "Custo",
                "description" => "Descrição",
                "thumbnail" => "Imagem",
            ];
        @endphp
        @include('components.table', ["records" => $types,
                                        "fields" => $fields,
                                        "route" => "room-info.room-type",
                                        'view' => true])
    </div>
@endsection
