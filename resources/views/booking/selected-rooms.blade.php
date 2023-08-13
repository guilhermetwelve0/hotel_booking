
<h3 class="mb-5 text-lg font-medium text-gray-900">Selected Rooms</h3>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-l-lg">
                    Room Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Room No
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg">
                    Price
                </th>
            </tr>
        </thead>
        <tbody id="cal_table_body">

        </tbody>
        <tfoot>
            <tr class="font-semibold text-gray-900">
                <th scope="row" class="px-6 py-3 text-base">Total</th>
                <td class="px-6 py-3"></td>
                <td class="px-6 py-3">$&nbsp;<span id="total">0</span></td>
                <input type="hidden" name="total" id="total_input">
            </tr>
        </tfoot>
    </table>
    <x-input-error class="mt-2" :messages="$errors->get('total')" />
</div>

<div class="text-end">
    <button type="submit" id="create-booking" class="text-primary border border-primary py-1 px-4 rounded-md hover:text-white hover:bg-primary">
        Create Booking
    </button>
</div>
