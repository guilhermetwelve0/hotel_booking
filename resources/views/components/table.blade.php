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
                        @if(in_array($col, ['created_at', 'updated_at', 'check_in_date', 'check_out_date']))
                            {{ dateFormat($record->$col, 'M d, Y') }}

                        @elseif(in_array($col, ['updatedByUser', 'guest', 'roomType']))
                            {{ $record->$col->name ?? '---' }}

                        @elseif($col === 'floor')
                            {{ ordinal($record->$col) }}

                        @elseif($col === 'room_no')
                            {{ $record->floor . leadZero($record->room_no) ?? '---' }}

                        @elseif($col === 'icon')
                            <i class="fa-solid {{ $record->$col ?? 'fa-ellipsis' }} fa-lg"></i>

                        @elseif($col === 'status')
                            @php
                                $idx = $record->$col;
                            @endphp
                            {{ config("status.status_label.$idx") }}

                        @elseif($col === 'price' || $col === 'total')
                            $&nbsp;{{ $record->$col ?? 0 }}

                        @elseif($col === 'thumbnail')
                            <a href="{{asset($record->$col)}}" class="underline text-blue-600">{{$record->$col ?? "/"}}</a>

                        @elseif($col === 'service_facility')
                            @forelse($record->services as $service)
                                <span class="rounded-full bg-blue-400 text-white py-1 px-4 m-1">
                                    <i class="fa-solid {{$service->icon}}"></i>&nbsp;{{$service->name}}
                                </span>
                            @empty
                                ---
                            @endforelse
                        @else
                            {{ $record->$col ?? '---' }}
                        @endif
                    </td>
                @endforeach
                <td class="bg-gray-{{ count($fields) % 2 ? '100' : '50' }} min-w-[111px]">
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
