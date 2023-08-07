<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <form class="max-w-xl" action="{{ route("$route.store") }}" method="post">
        @csrf
        @foreach ($fields as $label => $input)
            @php
                $name = $input['name'];
                $type = isset($input['type']) ? $input['type'] : 'text';
                $required = array_search('required', $input['attr']) !== false;
                $autofocus = array_search('autofocus', $input['attr']) !== false;
                $autocomplete = array_search('autocomplete', $input['attr']) !== false ? $name : 'off';
            @endphp
            <div class="pb-5">
                <x-input-label for="{{ $name }}" :value="$label" :required="$required"/>
                <x-text-input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
                    class="mt-1 block w-full" autocomplete="{{ $autocomplete }}"
                    :value="old($name)"
                    :required="$required"
                    :autofocus="$autofocus" />
                <x-input-error class="mt-2" :messages="$errors->get($name)" />
            </div>
        @endforeach
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </form>
</div>
