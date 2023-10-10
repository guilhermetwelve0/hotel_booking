<x-guest-layout>
    <form method="POST" action="{{route('guest-info-add')}}">
        @csrf
        <h1 class="text-2xl py-3">Informações do Hóspede</h1>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Telefone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" autocomplete="username" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="/">
                <i class="fa-solid fa-home"></i>
            </a>
            <x-primary-button class="ml-4">
                {{ __('Salvar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
