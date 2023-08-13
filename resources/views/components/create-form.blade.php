<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <form class="max-w-xl" action="{{ route("$route.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        @foreach ($fields as $label => $input)
            @php
                $name = $input['name'];
                $type = isset($input['type']) ? $input['type'] : 'text';
                $required = array_search('required', $input['attr']) !== false;
                $autofocus = array_search('autofocus', $input['attr']) !== false;
                $autocomplete = array_search('autocomplete', $input['attr']) !== false ? $name : 'off';
            @endphp
             @switch($type)
                @case('textarea')
                    <div class="pb-5">
                        <x-input-label for="{{ $name }}" :value="$label" :required="$required"/>
                        <textarea name="{{$name}}" rows="4" class="block p-2 mt-1 w-full text-sm text-gray-900 rounded-md border border-gray-300 bg-white focus:ring-blue-500 focus:border-blue-500"></textarea>
                        <x-input-error class="mt-2" :messages="$errors->get($name)" />
                    </div>
                    @break

                @case('file')
                    <div class="pb-5">
                        <x-input-label for="{{ $name }}" :value="$label" :required="$required"/>
                        <input name="{{ $name }}" type="{{ $type }}"
                            class="img-upload block w-full text-lg text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none">
                        <img src="" alt="{{$name}}" class="hidden mt-3 rounded-md" id="preview_img">
                        <x-input-error class="mt-2" :messages="$errors->get($name)" />
                    </div>
                    @break
                @case('select')
                    <div class="pb-5">
                        <x-input-label for="{{ $name }}" :value="$label" :required="$required"/>
                        @if ($name == 'icon')
                            <div class="flex">
                                <div class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-primary border border-gray-300 rounded-l-md">
                                    <i id="selected_icon"></i>
                                </div>
                                <select id="{{ $name }}" name="{{ $name }}"  class="icon-select bg-white border border-gray-300 text-gray-900 text-sm rounded-r-md border-l-gray-100 border-l-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option selected disabled>Choose an icon</option>
                                    @foreach (config('icons') as $icon)
                                        <option value="{{$icon['icon']}}">{{$icon['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @elseif(isset($input['multiple']))
                            <select id="multiple-select" multiple name="{{$name}}[]" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary focus:border-primary block w-full">
                                @foreach($input['select_obj'] as $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                            </select>
                        @else
                            <select id="{{ $name }}" name="{{ $name }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected disabled>Choose a {{ $label }}</option>
                                @foreach ($input['select_obj'] as $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                            </select>
                        @endif

                        <x-input-error class="mt-2" :messages="$errors->get($name)" />
                    </div>

                    @break

                @default
                    <div class="pb-5">
                        <x-input-label for="{{ $name }}" :value="$label" :required="$required"/>
                        <x-text-input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
                            class="mt-1 block w-full" autocomplete="{{ $autocomplete }}"
                            :value="old($name)"
                            :required="$required"
                            :autofocus="$autofocus" />
                        <x-input-error class="mt-2" :messages="$errors->get($name)" />
                    </div>
            @endswitch
            @if ($name == "price")
                <div class="pb-5 relative">
                    <label>Currency</label>
                    <x-text-input type="text" :disabled="true"
                        class="mt-1 block w-full bg-gray-200"
                        value="Dollar ($)" />
                    <span class="bg-yellow-300 px-5 rounded-full border border-secondary text-xs absolute top-[20px] right-[20px]">Pro</span>
                </div>
            @endif
        @endforeach
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </form>
</div>
