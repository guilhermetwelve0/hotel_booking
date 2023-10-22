<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Home') | {{ config('app.name', 'ESC-Hotel')}}</title>

        <link rel="stylesheet" href="{{ asset('/css/scroll.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/style.css')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
        <script src="{{asset('js/fontawesome.min.js')}}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/booking.js')}}"></script>

        {{-- Data Table --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

        {{-- iziToast --}}
        <link rel="stylesheet" href="{{ asset('/css/iziToast.min.css') }}">
        <script src="{{ asset('/js/iziToast.min.js') }}"></script>

        {{-- Date Picker --}}
        <script src="{{ asset('/js/datepicker.min.js') }}"></script>


        {{-- Multi Select --}}
        <link rel="stylesheet" href="{{ asset('/css/selectize.default.css') }}">
        <script src="{{ asset('/js/selectize.min.js') }}"></script>
            
    </head>
    <body class="font-sans antialiased">

    <div class="min-h-screen bg-green-900">
            @include('layouts.nav')
            <main>
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>


        @if(session('success'))
            <script>
                iziToast.success({
                    title: 'Success',
                    message: '{{ session("success") }}',
                    transitionIn: "bounceInLeft",
                });
            </script>
        @endif

        @if(session('error'))
            <script>
                iziToast.error({
                    title: 'Error',
                    message: '{{ session("error") }}',
                    transitionIn: "bounceInLeft",
                });
            </script>
        @endif
    </body>
</html>
