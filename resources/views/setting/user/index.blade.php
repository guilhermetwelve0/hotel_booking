<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            {{ __('Users') }}<i class="fa-solid fa-gear ps-3"></i>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10 justify-center">
    {{-- <table class="w-full data-table border">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Date Create</td>
                <td>Latest Edit</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

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
                <tr class="border-b border-gray-200 ">
                    <td class="bg-gray-100">{{$user->id}}</td>
                    <th class="bg-gray-50 ">{{$user->name}}</th>
                    <td class="bg-gray-100">{{$user->email}}</td>
                    <td class="bg-gray-50 ">{{$user->created_at->toFormattedDateString()}}</td>
                    <td class="bg-gray-100">{{$user->updated_at->toFormattedDateString()}}</td>
                    <td class="bg-gray-50 "></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-app-layout>
