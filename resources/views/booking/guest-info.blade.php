<div class="max-w-xl">
    <div class="flex flex-col sm:flex-row justify-between">
        <h1 class="text-lg font-medium text-gray-900">Guest Information</h1>
        <div class="text-end pt-3">
            <button disabled="disabled" class="text-sm border border-primary rounded-md py-1 px-2 bg-gray-200 relative">
                + Create New Guest
                <span class="bg-yellow-300 px-3 rounded-full border border-secondary text-xs absolute top-[-10px] right-[5px]">Pro</span>
            </button>
        </div>
    </div>
    <div class="pt-3">
        <x-input-label for="name" :value="__('Name')" />
        <select name="guest" id="guest_select" placeholder="Select a guest" class="mt-1">
            <option selected disabled></option>
            @foreach ($guests as $key => $guest)
                <option value="{{$key}}">{{$guest->name}}</option>
            @endforeach
        </select>
        <input type="hidden" name="guest_id" id="idInput">
        <input type="hidden" id="guestData" data-guests="{{json_encode($guests)}}">
    </div>
    <div class="pt-3">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="emailInput" name="email" type="text" class="mt-1 block w-full bg-gray-200" :disabled="true" />
    </div>
    <div class="pt-3">
        <x-input-label for="phone" :value="__('Phone')" />
        <x-text-input id="phoneInput" name="phone" type="text" class="mt-1 block w-full bg-gray-200" :disabled="true" />
    </div>
    <div class="pt-3">
        <x-input-label for="type" :value="__('Booking Type')" />
        <select name="guest" id="guest_select" class="mt-1 bg-white border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option selected disabled>Select booking type</option>
            <option value="call">Call</option>
            <option value="counter">Counter</option>
        </select>
    </div>
</div>
