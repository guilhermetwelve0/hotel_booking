<div class="max-w-xl">
    <div class="flex flex-col sm:flex-row justify-between">
        <h1 class="text-lg font-medium text-gray-900">Search Rooms</h1>
        <div class="text-end pt-3">
            <button type="button" id="find_room" class="text-sm border border-primary rounded-md py-1 px-2 hover:text-white hover:bg-primary">
                <i class="fa-solid fa-search"></i>
                Find Rooms
            </button>
        </div>
    </div>
    <div class="pt-3">
        <div date-rangepicker class="flex flex-col sm:flex-row items-center">
            <div class="relative mb-3 sm:mb-0 w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input required name="check_in_date" id="check_in" autocomplete="off" type="text" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Check in date">
            </div>
                <span class="mx-3 text-gray-500 hidden sm:block">to</span>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input required name="check_out_date" id="check_out" autocomplete="off" type="text" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Check out date">
            </div>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('check_in_date')" />
        <x-input-error class="mt-2" :messages="$errors->get('check_out_date')" />

    </div>
    <div class="pt-3 relative">
        <x-input-label for="type" :value="__('Room Type')" />
        <select disabled name="guest" id="guest_select" class="mt-1 bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary focus:border-primary block w-full p-2.5">
            <option selected disabled>Select room type</option>
        </select>
        <span class="bg-yellow-300 px-4 rounded-full border border-secondary text-xs absolute top-[25px] right-[25px]">Pro</span>
    </div>
    <div class="pt-3 relative">
        <x-input-label for="type" :value="__('Services and Gacilities')" />
        <select disabled name="guest" id="guest_select" class="mt-1 bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary focus:border-primary block w-full p-2.5">
            <option selected disabled>Select services and facilities</option>
        </select>
        <span class="bg-yellow-300 px-4 rounded-full border border-secondary text-xs absolute top-[25px] right-[25px]">Pro</span>
    </div>
</div>
