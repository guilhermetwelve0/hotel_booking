@extends('room_info.layout')

@section('title', 'Services & Facilities')

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn', [
            'name' => 'Service or Facility',
            'route' => 'room-info.service-facility.create',
            'create' => true
        ])
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @php
            $fields = [
                'icon' => 'Icon',
                'name' => 'Name',
                'price' => 'Cost',
            ];
        @endphp
        @include('components.table', [
            'records' => $services,
            'fields' => $fields,
            'route' => 'room-info.service-facility',
            'view' => true,
        ])
    </div>
@endsection
