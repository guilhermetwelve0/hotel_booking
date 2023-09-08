@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-[5px] border-secondary text-sm font-medium leading-5 text-secondary focus:outline-none focus:border-accent transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-[5px] border-transparent text-sm font-medium leading-5 text-accent hover:text-secondary hover:border-transparent focus:outline-none focus:text-white focus:border-transparent transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
