@extends('room_info.layout')

@section('title', "Services & Facilities")

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn',['back'=> 'room-info.service-facility.index'])
    </div>
    <div>
        @php
            $route = "room-info.service-facility";
            $fields = [
                'Icon' => [
                    'name' => 'icon',
                    'type' => 'select',
                    'attr' => ['required']
                ],
                'Name' => [
                    'name' => 'name',
                    'attr' => ['required','autofocus','autocomplete']
                ],
                'Price' => [
                    'name' => 'price',
                    'attr' => ['autocomplete']
                ],
            ];
        @endphp
        @if (isset($serviceFacility))
            @include('components.edit-form', [$fields, $route, 'data' => $serviceFacility])
        @else
            @include('components.create-form', [$fields, $route])
        @endif
    </div>
@endsection
