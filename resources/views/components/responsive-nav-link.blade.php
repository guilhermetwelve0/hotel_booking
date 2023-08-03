@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-secondary text-left text-base font-medium text-primary bg-accent focus:outline-none focus:text-secondary focus:bg-neutral focus:border-accent transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-secondary hover:text-accent hover:bg-secondary hover:border-primary focus:outline-none focus:text-primary focus:bg-secondary focus:border-accent transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
