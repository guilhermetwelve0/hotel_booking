@props(['records', 'fields'])

<table class="w-full text-sm text-left text-gray-500 data-table">
    <thead class="text-xs text-gray-700 uppercase">
        <tr>
            <th class="bg-gray-50">
                No.
            </th>

            @foreach ($fields as $col => $label)
                @php
                    $idx = array_search($col, array_keys($fields));
                @endphp
                <th class="bg-gray-{{ $idx % 2 ? '50' : '100' }}">
                    {{ $label }}
                </th>
            @endforeach
            <th class="bg-gray-{{ count($fields) % 2 ? '50' : '100' }}">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $i => $record)
            <tr class="border-b border-gray-200 hover-table">
                <td class="bg-gray-100">{{ $i + 1 }}</td>
                @foreach ($fields as $col => $label)
                    @php
                        $idx = array_search($col, array_keys($fields));
                    @endphp
                    <td class="bg-gray-{{ $idx % 2 ? '100' : '50' }} {{$loop->first ? 'font-bold' : ''}}">
                        @switch($col)
                            @case('created_at')
                                {{ $record->$col->format('M d, Y') }}
                                @break

                             @case('updated_at')
                                {{ $record->$col->format('M d, Y') }}
                                @break

                            @case('updated_by')
                                {{ $record->updatedByUser->name ?? '---' }}
                                @break

                            @case('floor')
                                {{ ordinal($record->$col) }}
                                @break

                            @case('room_no')
                                {{ $record->floor . leadZero($record->room_no) ?? '---' }}
                                @break

                            @case('room_type')
                                {{ $record->type->name ?? '---' }}
                                @break

                            @case('icon')
                                <i class="fa-solid {{ $record->$col ?? 'fa-ellipsis' }} fa-lg"></i>
                                @break

                            @case('price')
                                $&nbsp;{{ $record->$col ?? 0 }}
                                @break

                            @case('thumbnail')
                                <a href="{{asset($record->$col)}}" class="underline text-blue-600">{{$record->$col ?? "/"}}</a>
                                @break

                            @case('service_facility')
                                @forelse($record->services as $service)
                                    <span class="rounded-full bg-blue-400 text-white py-1 px-4 m-1">
                                        <i class="fa-solid {{$service->icon}}"></i>&nbsp;{{$service->name}}
                                    </span>
                                @empty
                                    ---
                                @endforelse
                                @break

                            @default
                                {{ $record->$col ?? '---' }}
                        @endswitch
                    </td>
                @endforeach
                <td class="bg-gray-{{ count($fields) % 2 ? '100' : '50' }} w-[150px]">
                    @php
                        $edit_route = $route;
                        if (auth()->user()->id == $record->id) {
                            $edit_route = 'profile';
                        }
                    @endphp
                    <a href='{{ route("$edit_route.edit", $record->id) }}' class="px-1 mx-1" title="Edit">
                        <i class="fa-solid fa-pen-to-square fa-lg text-secondary"></i>
                    </a>

                    <form action="{{ route("$edit_route.destroy", $record->id) }}" id="delete-form-{{$i}}" class="inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="px-1 mx-1 delete-btn" title="Delete"
                        data-target="{{$i}}">
                            <i class="fa-solid fa-trash-can fa-lg text-rose-400"></i>
                        </button>
                    </form>
                    @if (isset($view))
                        <a href="{{ route("$route.show", $record->id) }}" class="px-1 mx-1" title="Detail Info">
                            <i class="fa-solid fa-circle-info fa-lg text-blue-400"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
