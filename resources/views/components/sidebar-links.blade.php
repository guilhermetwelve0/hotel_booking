@props(['active'])

@php
$common = "flex items-center p-2 rounded-lg group ps-7 btn-rounded-reverse ";
$classes =  request()->routeIs($route)
            ? $common .= "text-primary bg-secondary"
            : $common .= isset($disabled) ? 'text-gray-400' : 'hover:bg-gray-700 text-neutral';
@endphp

<a href="{{ route("$route") }}" {{ $attributes->merge(['class' => $classes]) }}>
    <i class="fa-solid {{ $icon }} fa-lg"></i>
    <span class="ml-3">{{ $name }}</span>
    @if (isset($disabled))
        <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
    @endif
</a>
