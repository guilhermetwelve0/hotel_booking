
@extends('layouts.main')

@section('title', 'Rooms List')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <header class="bg-gradient-to-b from-primary to-[#0001] py-20 text-white text-center">
        <div class="container mx-auto">
            <h1 class="text-4xl font-semibold mb-4">Rooms</h1>
            <p class="text-lg text-secondary">Royal Luxury rooms from our hotel</p>
        </div>
    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mb-10">
        @foreach ($rooms as $room)
            @include('components.card', $room)
        @endforeach
    </div>
</div>
@endsection
