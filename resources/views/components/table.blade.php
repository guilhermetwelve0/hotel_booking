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
                        {{$label}}
                </th>
            @endforeach
            <th class="bg-gray-{{count($fields) % 2 ? '50' : '100' }}">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $i => $record)
            <tr class="border-b border-gray-200">
                <td class="bg-gray-100">{{$i+1}}</td>
                @foreach ($fields as $col => $label)
                    @php
                        $idx = array_search($col, array_keys($fields));
                    @endphp
                    <td class="bg-gray-{{ $idx % 2 ? '100' : '50' }}">
                        @if ($col == 'created_at' || $col == 'updated_at')
                            {{$record->$col->format('M d, Y')}}

                        @elseif ($col == 'updated_by')
                            {{$record->updatedByUser->name ?? '---'}}
                        @else
                            {{$record->$col ?? "---"}}
                        @endif
                    </td>
                @endforeach
                <td class="bg-gray-{{count($fields) % 2 ? '100' : '50' }}">
                        @php
                            $edit_route = $route;
                            if(auth()->user()->id == $record->id){
                                $edit_route = "profile";
                            }
                        @endphp
                        <a href='{{ route("$edit_route.edit", $record->id)}}' class="px-1 mx-1" title="Edit">
                            <i class="fa-solid fa-pen-to-square fa-lg text-secondary"></i>
                        </a>

                    <a href="" class="px-1 mx-1" title="Delete">
                        <i class="fa-solid fa-trash-can fa-lg text-rose-400"></i>
                    </a>
                    @if (isset($view))
                        <a href="{{ route("$route.show", $record->id)}}" class="px-1 mx-1" title="Detail Info">
                            <i class="fa-solid fa-circle-info fa-lg text-blue-400"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
