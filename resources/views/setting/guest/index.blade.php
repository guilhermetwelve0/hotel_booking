@section('title', "Lista de Hóspedes")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Hóspedes') }}<i class="fa-solid fa-users-viewfinder ps-3"></i>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 justify-center">
        <div class="flex justify-between items-center p-4">
            @include('components.back-and-create-btn', [
                'name' => 'Hóspede',
                'route' => 'setting.guest.create',
                'back' => 'setting.index',
                'create' => true
            ])
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @php
                $fields = [
                    'name' => 'Nome',
                    'email' => 'Email',
                    'phone' => 'Telefone',
                    'created_at' => 'Data de Criação',
                    'updated_at' => 'Última Atualização',
                    'updatedByUser' => 'Atualizado por',
                ];
            @endphp
            @include('components.table', [
                'records' => $guests,
                'fields' => $fields,
                'route' => 'setting.guest',
                'view' => true,
            ])
        </div>
    </div>
</x-app-layout>
