@extends('room_info.layout')

@section('title', "Serviços e Facilidades")

@section('content')
    <div class="flex justify-between items-center pb-4">
        @include('components.back-and-create-btn',['back'=> 'room-info.service-facility.index'])
    </div>
    <div>
        @php
            $route = "room-info.service-facility";
            $fields = [
                'Ícone' => [
                    'name' => 'icon',
                    'type' => 'select',
                    'attr' => ['required']
                ],
                'Nome' => [
                    'name' => 'name',
                    'attr' => ['required','autofocus','autocomplete']
                ],
                'Preço' => [
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
