<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Users') }}<i class="fa-solid fa-gear ps-3"></i>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4 justify-center">
        @include('components.back-and-create-btn',["name"=>"User",
                                                    "route"=>"dashboard",
                                                    "back" => "setting.index"])
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 data-table">
                <thead class="text-xs text-gray-700 uppercase ">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                            Date Create
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50">
                            Latest Update
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b border-gray-200">
                            <td class="bg-gray-100">{{$user->id}}</td>
                            <th class="bg-gray-50">{{$user->name}}</th>
                            <td class="bg-gray-100">{{$user->email}}</td>
                            <td class="bg-gray-50">{{$user->created_at->toFormattedDateString()}}</td>
                            <td class="bg-gray-100">{{$user->updated_at->toFormattedDateString()}}</td>
                            <td class="bg-gray-50">
                                <a href="" class="px-1 mx-1">
                                    <i class="fa-solid fa-pen-to-square fa-lg text-secondary"></i>
                                </a>
                                <a href="" class="px-1 mx-1">
                                    <i class="fa-solid fa-trash-can fa-lg text-rose-400"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
