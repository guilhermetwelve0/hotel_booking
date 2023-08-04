@props(['active','icon','title','disabled','route','summary'])

@php
    $common = "relative max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ";
    $classes = $common .= $disabled ? 'bg-gray-200' : ' hover:bg-gray-100';
@endphp

<a @if (!$disabled) href="{{ route("$route") }}" @endif {{ $attributes->merge(['class' => $classes]) }}>
    <i class="fa-solid {{ $icon }} text-3xl text-gray-500"></i>
    <h5 class="my-2 text-2xl font-semibold tracking-tight text-gray-900">{{ $title }}</h5>
    <p class="mb-3 font-normal text-gray-500">{{ $summary }}</p>
    @if ($disabled)
        <span class="absolute top-3 right-3 bg-secondary px-7 rounded-full">Pro</span>
    @endif
</a>
