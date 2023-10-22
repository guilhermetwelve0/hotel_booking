@section('title', "Fazer Reserva")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Fazer Reserva") }}<i class="fa-solid fa-bookmark ms-3"></i>
        </h2>
    </x-slot>

    <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-5 scroll-smooth" action="{{route('booking.store')}}" method="post">
        @csrf
        <div class="flex justify-between items-center px-4">
            @include('components.back-and-create-btn',['back'=> 'booking.index'])
        </div>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            @include('booking.guest-info')
        </div>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            @include('booking.search-rooms')
        </div>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg hidden" id="filtered_room">
            @include('booking.filtered-rooms')
        </div>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg hidden" id="selected_room">
            @include('booking.selected-rooms')
        </div>
    </form>
</x-app-layout>
