
@extends('layouts.main')

@section('content')
    {{-- Web Banner --}}
    <section class="web-banner">
        <img src="{{asset('img/hotel-banner.png')}}" alt="Web Banner" class="w-full">
    </section>

    <form action="{{route('guest-booking-add')}}" method="post" id="web_form">
        @csrf
        {{-- Search Rooms --}}
        <section class="relative">
            <div class="absolute bg-primary rounded lg:flex p-5 room-search min-w-[300px]">
                <div date-rangepicker class="flex flex-col md:flex-row items-center mb-3">
                    <div class="relative mb-2 md:mb-0">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input required name="check_in_date" id="check_in" autocomplete="off" type="text" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Check in date">
                    </div>
                        <span class="mx-3 text-gray-500 hidden md:block">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input required name="check_out_date" id="check_out" autocomplete="off" type="text" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Check out date">
                    </div>
                </div>
                <div class="mb-3 lg:ms-3">
                    <button type="button" id="find_room" class="p-2 h-full w-full rounded-md text-white text-md border border-white hover:bg-white hover:text-gray-600">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span class="mx-2 lg:hidden">Find Rooms</span>
                    </button>
                </div>
            </div>
        </section>

        {{-- Rooms Cards --}}
        <section class="pb-10">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="p-4 sm:p-8 bg-[#fff9] shadow sm:rounded-lg mb-5 hidden" id="filtered_room">
                    @include('booking.filtered-rooms')
                </div>
                <div class="p-4 sm:p-8 bg-[#fffe] shadow sm:rounded-lg mb-5 hidden" id="selected_room">
                    @include('booking.selected-rooms')
                </div>
                <input type="hidden" id="guest_id" name="guest_id" value="{{ session('guest_id') }}">

                <h1 class="text-secondary cinzel-decorative text-2xl mb-3">Our Best Rooms</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($bestRooms as $room)
                        @include('components.card', $room)
                    @endforeach
                </div>
                <div class="flex justify-end py-3">
                    <a href="{{route('room-list')}}" class="text-white hover:text-blue-500 hover:underline">View More Rooms <i class="fa-solid fa-angles-right"></i></a>
                </div>
            </div>
        </section>


        <!-- guest info modal -->
        <div id="guest-modal" tabindex="-1" aria-hidden="true" class="bg-[#0005] backdrop-blur-sm fixed z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto inset-0 h-full max-h-full">
            <div class="w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="fixed bg-white rounded-lg shadow top-[50%] left-1/2 translate-x-[-50%] translate-y-[-50%] min-w-[300px] w-1/4">
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 ">Fill Your Information</h3>
                        <div>
                            <div class="mb-6">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class="mb-6">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                            <div class="mb-6">
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" name="phone" type="number" class="mt-1 block w-full" required autocomplete="phone" />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>
                            <div class="flex gap-3">
                                <button data-modal-hide="guest-modal" type="button" class="w-full text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                    Cancel
                                </button>
                                <button data-modal-target="guest-modal" id="booking_submit" type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Submit Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <script>
        $(document).ready(function() {
            $('#create-booking').click(function(e) {
                e.preventDefault(); 

                var guestId = $('#guest_id').val();

                if (guestId !== '') {
                    $('#web_form').submit();
                } else {
                    $('#guest-modal').show();
                }
            });

            $('#booking_submit').click(function() {
                $('#web_form').submit(); 
            });
        });
    </script>
@endsection
