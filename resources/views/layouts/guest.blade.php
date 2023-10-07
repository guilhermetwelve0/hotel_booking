<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ESC-HOTEL') }}</title>

        <link rel="stylesheet" href="{{ asset('/css/scroll.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/style.css')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
        <script src="{{asset('js/app.js')}}"></script>

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
        <script src="{{asset('js/fontawesome.min.js')}}"></script>

         <!-- iziToast  -->
        <link rel="stylesheet" href="{{ asset('/css/iziToast.min.css') }}">
        <script src="{{ asset('/js/iziToast.min.js') }}"></script>

        {{-- Data Table --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

        {{-- Multi Select --}}
        <link rel="stylesheet" href="{{ asset('/css/selectize.default.css') }}">
        <script src="{{ asset('/js/selectize.min.js') }}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-primary antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-green-900">
            <div>
                <a href="/" class="text-secondary text-3xl cinzel-decorative flex flex-col items-center sm:flex-row sm:items-end">
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                    <img src="{{asset('img/crown.png')}}" alt="crown" class="w-[75px]"><span>ESC-HOTEL MANAGEMENT SYSTEM</span>

                </a>
            </div>

            <div class="w-full max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
                {{ $slot }}
            </div>
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
