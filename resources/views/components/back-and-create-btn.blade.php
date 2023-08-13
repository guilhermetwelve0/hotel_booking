@if (!isset($disabled_back))
    <a href="{{ isset($back) ? route("$back") : url()->previous() }}">
        <i class="fa-solid fa-chevron-left me-2"></i>
        Back
    </a>
@endif
@if (isset($create))
    <a href="{{route("$route")}}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-primary rounded-lg group bg-primary">
        <span class="relative px-5 py-2 transition-all ease-in duration-75 bg-gray-100 rounded-md group-hover:bg-opacity-0 group-hover group-hover:text-white">
            {{isset($name) ? "Add New $name" : $custom_name}}
            <i class="fa-solid fa-plus ms-2"></i>
        </span>
    </a>
@endif
@if (isset($deleted_at_records))
    <a href="{{route("$deleted_at_records[1]")}}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-rose-600 rounded-lg group bg-rose-600">
        <span class="relative px-5 py-2 transition-all ease-in duration-75 bg-gray-100 rounded-md group-hover:bg-opacity-0 group-hover group-hover:text-white">
            {{$deleted_at_records[0]}}
        </span>
    </a>
@endif

