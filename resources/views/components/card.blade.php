    <div class="relative bg-gradient-to-r from-[#1119] to-[#9991] rounded-md shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:rotate-2">
      <img src="{{asset($room->roomType?->thumbnail)}}" alt="Room Image" class="w-full h-48 object-cover rounded-t-lg">
      <div class="p-4">
        <div class="flex justify-between">
            <h2 class="text-2xl font-semibold text-white mb-2">{{$room->roomType?->name}}</h2>
            <p class="text-accent mb-2">${{$room->total_price}}</p>
        </div>
        <p class="text-gray-400 text-clamp mb-5">
            {{$room->roomType?->description}}
        </p>
        <div class="mb-8">
            @foreach ($room->services as $service)
                <span class="px-2 py-1 bg-blue-600 text-white rounded-full text-xs m-1 whitespace-nowrap">
                    <i class="fa-solid {{$service->icon}}"></i>&nbsp;{{$service->name}}
                </span>
            @endforeach
        </div>
        <button class="bg-primary hover:bg-gray-600 text-white px-4 py-2 rounded-br-md rounded-tl-lg border-t border-l border-accent absolute right-0 bottom-0">{{ $room->floor . leadZero($room->room_no) }}</button>
      </div>
    </div>
