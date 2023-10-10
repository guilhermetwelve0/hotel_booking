@section('title', $roomType->name)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ $roomType->name . " Rooms" }}<i class="fa-solid fa-door-open ps-3"></i>
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 justify-center">
        <div class="flex justify-between items-center p-4">
            @include('components.back-and-create-btn', [
                'back' => 'room-info.room-type.index',
            ])
        </div>
        <div class="grid sm:grid-cols-2 m-4 gap-10">
            <img src="{{asset($roomType->thumbnail)}}" alt="" class="rounded-lg">
            <div>
                <h1 class="text-3xl font-semibold">
                    {{$roomType->name}} Rooms
                </h1>
                <p class="py-5 indent-8">
                    {{$roomType->description}}
                </p>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @php
                $fields = [
                    "room_no" => "N° do Quarto",
                    "floor" => "Andar",
                    "service_facility" => "Serviços e Facilidades"
                ];
            @endphp
            @include('components.table', [
                'records' => $roomType->rooms,
                'fields' => $fields,
                'route' => 'room-info.room-type',
            ])
        </div>
    </div>
</x-app-layout>
