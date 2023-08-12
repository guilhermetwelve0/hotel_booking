
<h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Filtered Rooms</h3>
<ul class="grid w-full gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
    @for ($i=0; $i < 5; $i++)
    <li>
        <input type="checkbox" id="option{{$i}}" value="" class="hidden peer" required="">
        <label for="option{{$i}}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="block">
                <div class="w-full text-2xl font-semibold">404</div>
                <div class="w-full text-lg">Double</div>
                <div class="w-full text-sm">wifi, dining, coffee...</div>
            </div>
        </label>
    </li>
    @endfor
</ul>

