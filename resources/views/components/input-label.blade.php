@props(['value','required'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
    @if (isset($required)? $required : false)
        <span class="text-rose-500">*</span>
    @endif
</label>
