<button
    {{ $attributes->merge([
        'type' => 'submit',
        'style'=> 'background: #13293D',
        'class' =>
            'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-600 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
