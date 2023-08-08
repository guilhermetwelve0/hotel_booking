@section('title', (isset($guest)? "Edit" : "Create")." Guest")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(isset($guest) ? 'Edit Guest Info' : 'Create New Guest') }}<i class="fa-solid fa-user-pen ms-3"></i>
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between items-center px-5 sm:px-0">
                @include('components.back-and-create-btn',['back'=> 'setting.guest.index'])
            </div>
            <div>
                @php
                    $route = "setting.guest";
                    $fields = [
                        'Name' => [
                            'name' => 'name',
                            'attr' => ['required','autofocus','autocomplete']
                        ],
                        'Email' => [
                            'name' => 'email',
                            'type' => 'email',
                            'attr' => ['autocomplete']
                        ],
                        'Phone' => [
                            'name' => 'phone',
                            'type' => 'number',
                            'attr' => ['autocomplete']
                        ],
                    ];
                @endphp
                @if (isset($guest))
                    @include('components.edit-form', [$fields, $route, 'data' => $guest])
                @else
                    @include('components.create-form', [$fields, $route])
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
