<a href="{{ isset($back) ? route("$back") : url()->previous() }}">
    <i class="fa-solid fa-chevron-left me-2"></i>
    Back
</a>
@if (isset($create))
    <a href="{{route("$route")}}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-primary rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 focus:ring-4 focus:outline-none focus:ring-lime-200">
        <span class="relative px-5 py-2 transition-all ease-in duration-75 bg-gray-100 rounded-md group-hover:bg-opacity-0 group-hover">
            Add New {{$name}}
            <i class="fa-solid fa-plus ms-2"></i>
        </span>
    </a>
@endif

