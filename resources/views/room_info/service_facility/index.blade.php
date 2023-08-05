@extends('room_info.layout')

@section('title', 'Services & Facilities')

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn', [
            'name' => 'Service or Facility',
            'route' => 'dashboard',
            'create' => true
        ])
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @php
            $fields = [
                'name' => 'Name',
                'price' => 'Cost',
                'icon' => 'Icon',
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
