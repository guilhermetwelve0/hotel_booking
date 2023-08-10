
@extends('layouts.main')

@section('content')
    {{-- Web Banner --}}
    <section class="web-banner">
        <img src="{{asset('img/hotel-banner.png')}}" alt="Web Banner" class="w-full">
    </section>

    {{-- Search Rooms --}}
    <section class="relative">
        <form action="" class="absolute bg-primary rounded lg:flex p-5 room-search min-w-[300px]">
            @csrf
            <div date-rangepicker class="flex flex-col md:flex-row items-center">
                <div class="relative mb-2 md:mb-0">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input name="check_in" type="text" class="bg-accent border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="Check in date">
                </div>
                    <span class="mx-3 text-gray-500 hidden md:block">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input name="check_out" type="text" class="bg-accent border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Check out date">
                </div>
            </div>
            <div class="py-3 lg:ms-3">
                <button type="submit" class="p-2 h-full w-full rounded-md text-white text-md border border-white hover:bg-white hover:text-gray-600">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span class="mx-2 lg:hidden">Find Rooms</span>
                </button>
            </div>
        </form>
    </section>

    {{-- Rooms Cards --}}
    <section class="pb-10">
        <div class="w-full flex justify-center stars">
            <img src="{{asset('img/stars.png')}}" alt="stars" class="h-[50px]">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-secondary cinzel-decorative text-2xl mb-3">Our Best Rooms</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @include('components.card')
                @include('components.card')
                @include('components.card')
            </div>
            <div class="flex justify-end py-3">
                <a href="#" class="text-white hover:text-blue-500 hover:underline">View More Rooms <i class="fa-solid fa-angles-right"></i></a>
            </div>
        </div>
    </section>
@endsection
