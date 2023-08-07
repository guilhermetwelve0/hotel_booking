@props(['disabled' => false, 'required' => false, 'autofocus' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm',
    'required' => $required ? 'required' : null,
    'autofocus' => $autofocus ? 'autofocus' : null
    ]) !!}>
