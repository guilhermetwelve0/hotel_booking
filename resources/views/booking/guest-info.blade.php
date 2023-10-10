<div class="max-w-xl">
    <div class="flex flex-col sm:flex-row justify-between">
        <h1 class="text-lg font-medium text-gray-900">Informações do Hóspede</h1>
        <div class="text-end pt-3">
            <a href="{{route('setting.guest.create')}}" class="text-sm border border-primary rounded-md py-1 px-2 bg-gray-200 relative">
                + Criar Novo Hóspede
                <!--<span class="bg-yellow-300 px-3 rounded-full border border-secondary text-xs absolute top-[-10px] right-[5px]">Pro</span>-->
            </a>
        </div>
    </div>
    <div class="pt-3">
        <x-input-label for="name" :value="__('Nome')" />
        <select name="guest" id="guest_select" placeholder="Selecione um hóspede" class="mt-1">
            <option selected disabled></option>
            @foreach ($guests as $key => $guest)
                <option value="{{$key}}">{{$guest->name}}</option>
            @endforeach
        </select>
        <input type="hidden" name="guest_id" id="idInput">
        <input type="hidden" id="guestData" data-guests="{{json_encode($guests)}}">
        <x-input-error class="mt-2" :messages="$errors->get('guest_id')" />
    </div>
    <div class="pt-3">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="emailInput" name="email" type="text" class="mt-1 block w-full bg-gray-200" :disabled="true" />
    </div>
    <div class="pt-3">
        <x-input-label for="phone" :value="__('Telefone')" />
        <x-text-input id="phoneInput" name="phone" type="text" class="mt-1 block w-full bg-gray-200" :disabled="true" />
    </div>
    <div class="pt-3">
        <x-input-label for="type" :value="__('Tipo de Reserva')" />
        <select name="type" class="mt-1 bg-white border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option selected disabled>Selecionar tipo de reserva</option>
            <option value="call">Ligação</option>
            <option value="counter">Balcão</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('type')" />
    </div>
</div>
