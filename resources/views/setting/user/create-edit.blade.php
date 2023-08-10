@section('title', (isset($user)? "Edit" : "Create")." User")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(isset($user) ? 'Edit Admin Info' : 'Create New Admin') }}<i class="fa-solid fa-user-pen ms-3"></i>
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between items-center px-5 sm:px-0">
                @include('components.back-and-create-btn',['back'=> 'setting.user.index'])
            </div>
            <div>
                @php
                    $route = "setting.user";
                    $fields = [
                        'Name' => [
                            'name' => 'name',
                            'attr' => ['required','autofocus','autocomplete']
                        ],
                        'Email' => [
                            'name' => 'email',
                            'type' => 'email',
                            'attr' => ['required']
                        ]
                    ];
                @endphp
                @if (isset($user))
                    @include('components.edit-form', [$fields, $route, 'data' => $user])
                @else
                    @php
                        $fields += [
                            'Password' => [
                                'name' => 'password',
                                'type' => 'password',
                                'attr' => ['required']
                            ],
                            'Confirm Password' => [
                                'name' => 'password_confirmation',
                                'type' => 'password',
                                'attr' => ['required']
                            ],
                        ];
                    @endphp
                    @include('components.create-form', [$fields, $route])
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
