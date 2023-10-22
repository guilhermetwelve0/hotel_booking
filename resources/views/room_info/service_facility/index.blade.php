@extends('room_info.layout')

@section('title', 'Serviços e Facilidades')

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn', [
            'name' => '',
            'route' => 'room-info.service-facility.create',
            'create' => true
        ])
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @php
            $fields = [
                'icon' => 'Ícone',
                'name' => 'Nome',
                'price' => 'Custo',
            ];
        @endphp
        @include('components.table', [
            'records' => $services,
            'fields' => $fields,
            'route' => 'room-info.service-facility'
        ])
    </div>
@endsection
