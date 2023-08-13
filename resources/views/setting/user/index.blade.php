@section('title', "Admin Users' Setting")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Admin Users') }}<i class="fa-solid fa-solid fa-users-gear ps-3"></i>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-7 justify-center">
        <div class="flex justify-between items-center px-5 sm:px-0">
            @include('components.back-and-create-btn', [
                'name' => 'Admin',
                'route' => 'setting.user.create',
                'back' => 'setting.index',
                'create' => true
            ])
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @php
                $fields = [
                    'name' => 'Name',
                    'email' => 'Email',
                    'created_at' => 'Date Create',
                    'updated_at' => 'Latest Update',
                    'updatedByUser' => 'Updated By',
                ];
            @endphp
            @include('components.table', [
                'records' => $users,
                'fields' => $fields,
                'route' => 'setting.user',
            ])
        </div>
    </div>
</x-app-layout>
