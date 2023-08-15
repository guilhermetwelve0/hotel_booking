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
            <tr class="border-b hover-table">
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

                        @elseif($col === 'rooms')
                            @foreach ($record->$col as $room)
                            {{ $room->floor . (leadZero($room->room_no) ?? '---') . ($loop->last ? '' : ',')}}
                            @endforeach

                        @elseif($col === 'icon')
                            <i class="fa-solid {{ $record->$col ?? 'fa-ellipsis' }} fa-lg"></i>

                        @elseif($col === 'status')  
                            @php
                                $idx = $record->$col;
                                $bg = config("status.status_bg_color.$idx");
                                $border = config("status.status_border_color.$idx");
                            @endphp
                            <span class="px-3 status-cols text-gray-600 {{$bg}} {{$border}} border flex items-center py-1 h-full w-full rounded-md">
                                <i class="fa-solid fa-{{config("status.status_icon.$idx")}} me-3"></i>
                                {{ config("status.status_label.$idx") }}
                            </span>

                        @elseif($col === 'price' || $col === 'total')
                            $&nbsp;{{ $record->$col ?? 0 }}

                        @elseif($col === 'thumbnail')
                            <a href="{{asset($record->$col)}}" class="underline text-blue-600">{{$record->$col ?? "/"}}</a>

                        @elseif($col === 'service_facility')
                            <div style="height: fit-content">
                                @forelse($record->services as $service)
                                <span class="rounded-full bg-blue-300 border border-blue-900 text-blue-900 py-1 px-4 m-1 whitespace-nowrap">
                                    <i class="fa-solid {{$service->icon}}"></i>&nbsp;{{$service->name}}
                                </span>
                                @empty
                                    ---
                                @endforelse
                            </div>
                        @else
                            {{ $record->$col ?? '---' }}
                        @endif
                    </td>
                @endforeach
                <td class="bg-gray-{{ count($fields) % 2 ? '100' : '50' }} min-w-[111px] ">
                    @php
                        $edit_route = $route;
                        $admin = auth()->user()->id ?? null;
                        if ($admin == $record->id) {
                            $edit_route = 'profile';
                        }
                    @endphp
                    @if (!isset($remove_edit_del))
                        <a href='{{ route("$edit_route.edit", $record->id) }}' class="px-1 mx-1" title="Edit">
                            <i class="fa-solid fa-pen-to-square fa-lg text-secondary"></i>
                        </a>

                        <form action="{{ route("$edit_route.destroy", $record->id) }}" id="delete-form-{{$i}}" class="inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="px-1 mx-1 delete-btn" title="Delete" onclick="deleteRow({{$i}})">
                                <i class="fa-solid fa-trash-can fa-lg text-rose-400"></i>
                            </button>
                        </form>
                    @endif

                    @if (isset($view))
                        <a href="{{ route("$route.show", $record->id) }}" class="px-1 mx-1" title="Detail Info">
                            <i class="fa-solid fa-circle-info fa-lg text-blue-400"></i>
                        </a>
                    @endif
                    @if ($col === 'status' && $record->status != config("status.status_id.completed") && !isset($no_action))
                            <a class="px-1 mx-1 status-chg-btn" title="Change Status" id="status_change{{$i}}" onclick="initDropdowns()" data-dropdown-toggle="changeStatus{{$i}}">
                                <i class="fa-solid fa-ellipsis fa-lg"></i>
                            </a>
                            <!-- data-dropdown-toggle="changeStatus{{$i}}"   -->
                            <div id="changeStatus{{$i}}" class="absolute m-0 z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 status-chg-dropdown" style="inset: 0px auto auto 0px;">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="status_change{{$i}}">
                                    @if (auth()->user())
                                        @switch($record->status)
                                            @case(config("status.status_id.pending"))
                                                <li>
                                                    <a href="javascript:;" data-booking="{{$record->id}}" data-status="{{config("status.status_id.booked")}}" class="update-status block px-4 py-2 hover:bg-gray-100">Confirm Booking</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-booking="{{$record->id}}" data-status="{{config("status.status_id.checkedIn")}}" class="update-status block px-4 py-2 hover:bg-gray-100">Check In</a>
                                                </li>
                                                @break

                                            @case(config("status.status_id.booked"))
                                                <li>
                                                    <a href="javascript:;" data-booking="{{$record->id}}" data-status="{{config("status.status_id.checkedIn")}}" class="update-status block px-4 py-2 hover:bg-gray-100">Check In</a>
                                                </li>
                                                @break

                                            @case(config("status.status_id.checkedIn"))
                                                <li>
                                                    <a href="javascript:;" data-booking="{{$record->id}}" data-status="{{config("status.status_id.completed")}}" class="update-status block px-4 py-2 hover:bg-gray-100">Check Out</a>
                                                </li>
                                                @break
                                            @default

                                        @endswitch
                                    @endif
                                    <li onclick="deleteRow({{$i}})">
                                        <form action="{{ route("$route.destroy", $record->id) }}" id="delete-form-{{$i}}" class="block px-4 py-2 hover:bg-gray-100" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="delete-btn" title="Delete">
                                                Cancel
                                            </button>
                                        </form>
                                    </li>

                                </ul>
                            </div>

                    @endif
                    @if (isset($no_action))
                        <button type="button" disabled class="relative px-1 mx-1" title="restore">
                            <i class="fa-solid fa-rotate-left fa-lg text-green-600"></i>
                            Restore
                            <span class="bg-yellow-300 px-3 rounded-full border border-secondary text-xs absolute top-[-15px] right-[-25px]">Pro</span>
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
