$(document).ready(function() {

    $('#guest_select').selectize();

    $('#guest_select').change(function() {
        guestData = $('#guestData').data('guests')
        idx = $(this).val()

        // console.log(guestData[idx].id)

        $('#emailInput').val(guestData[idx].email)
        $('#phoneInput').val(guestData[idx].phone)
        $('#idInput').val(guestData[idx].id)
    })

    $('#find_room').click(function() {
        event.preventDefault();

        startDate = $("#check_in").val();
        endDate = $("#check_out").val();
        $.ajax({
            url: "/ajax/search-rooms",
            type: "GET",
            data: {
                check_in: startDate,
                check_out: endDate
            },
            dataType: "json",
            success: function (response) {
                // console.log(response)
                console.log(dateCount(startDate, endDate))
                day_count = dateCount(startDate, endDate);
                if(response.length > 0){
                    scrollTo('#filtered_room')

                    // reset rooms and list
                    $('#filtered_room ul li').each(function(){
                        $(this).remove();
                    })
                    $('#cal_table_body tr').each(function(){
                        $(this).remove();
                    })

                    $.each(response, function(index, value){
                        $("#filtered_room ul").append(roomSelector(index, value));
                    })

                    // Room Select
                    $('.room-check').click(function(){
                        scrollTo('#selected_room')
                        idx = $(this).data("index");
                        check_id = $(this).attr('for');

                        // Table Row Update
                        if(!$(`#${check_id}`).prop('checked')){
                            $('#cal_table_body').append(tableRow(idx, response[idx], day_count))
                            $('#rooms_input').append(`<input type="hidden" name="rooms[]" value="${response[idx].id}" id="input_${idx}">`)
                        } else {
                            $(`#row_${idx}`).remove()
                            $(`#input_${idx}`).remove()
                        }

                        // Update Total
                        sum = 0;
                        $('.price-val').each(function() {
                            sum += parseFloat($(this).text());
                        });
                        $('#total').html(sum);
                        $('#total_input').val(sum);
                    })
                } else{
                    console.log("empty")
                }
            },
            error: function (xhr, status, error) {
                $('#filtered_room').addClass('hidden')
                $('#selected_room').addClass('hidden')
                console.log("An error occurred: " + error);
            }
        });
    })

    $('.update-status').click(function () {
        event.preventDefault();

        booking_id = $(this).data('booking');
        status_id = $(this).data('status');
        // console.log(booking_id, status_id)
        $.ajax({
            url: "/ajax/update-status",
            type: "GET",
            data: {
                booking_id: booking_id,
                status_id: status_id
            },
            dataType: "json",
            success: function (response){
                // console.log(response)
                location.reload();
            },
            error: function (xhr, status, error) {
                console.log("An error occurred: " + error);
            }
        })
    })
})

function roomSelector(index, room)
{
    let cost = parseFloat(room.room_type.price);
    let services = "";
    $.each(room.services, function(idx, val){
        comma = idx === room.services.length - 1 ? "." : ", ";
        services += val.name + comma;
        cost += parseFloat(val.price);
    })

    return `
    <li>
        <input type="checkbox" id="room_${room.id}" value="${room.id}" class="hidden peer">
    <label for="room_${room.id}" data-index="${index}" class="room-check inline-flex flex-col items-center justify-between h-full w-full p-5 text-gray-500 bg-[#fff9] border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-blue-600 peer-checked:text-blue-500 hover:bg-blue-50">
            <div class="w-full flex justify-between mb-3">
                <div class="text-2xl font-bold">${room.floor}${room.room_no < 10 ? 0 : ''}${room.room_no}</div>
                <div class="text-lg">${room.room_type.name}</div>
            </div>
            <div class="w-full text-sm text-gray-400">
                ${services}
            </div>
            <div class="w-full text-md">Cost: <span class="text-lg font-semibold">$${cost}</span> /night</div>
        </label>
    </li>
    `;
}

function tableRow(index, room, day){
    let cost = parseFloat(room.room_type.price);

    $.each(room.services, function(idx, val){
        cost += parseFloat(val.price);
    })
    return `
        <tr class="border border-b" id="row_${index}">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                ${room.room_type.name}
            </th>
            <td class="px-6 py-4">
                ${room.floor}${room.room_no < 10 ? 0 : ''}${room.room_no}
            </td>
            <td class="px-6 py-4">
                $<span>${cost}</span>
            </td>
            <td class="px-6 py-4">
                ${day} day${day > 1 ? 's' : ''}
            </td>
            <td class="px-6 py-4">
                $<span class="price-val">${cost*day}</span>
            </td>
        </tr>
    `
}

function scrollTo(section){
    $(section).removeClass('hidden');
    $('html, body').animate({
        scrollTop: $(section).offset().top
    }, 800);
}

function dateCount(startDate, endDate){
    startDate = new Date(startDate);
    endDate = new Date(endDate);
    timeDifference = endDate.getTime() - startDate.getTime();
    daysDifference = timeDifference / (1000 * 3600 * 24);
    return daysDifference != 0 ? daysDifference : 1;
}