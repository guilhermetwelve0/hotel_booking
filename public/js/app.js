$(document).ready(function() {
    $('.data-table').DataTable();

    $("#email").on("focus",
        function(){
            $('#envelope').addClass('fa-bounce')
        }
    )
    $("#email").on("blur",
        function(){
            $('#envelope').removeClass('fa-bounce')
        }
    )
    $("#password").on("focus blur",
        function(){
            $('#lock').toggleClass('fa-shake')
        }
    )

    $('.delete-btn').on('click', function () {
        var target = $(this).data('target');
        console.log(target);

        iziToast.question({
            color:'yellow',
            timeout: false,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            icon: 'fa-regular fa-circle-question',
            zindex: 999,
            title: 'Delete',
            message: 'Do you really want to delete this record?',
            position: 'center',
            drag: false,
            class: "delete-toast",
            titleSize: "1.5em",
            icon: null,
            transitionIn: "flipInX",
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    console.log(target)
                    $(`#delete-form-${target}`).submit();
                }, true],
                ['<button>NO</button>', function (instance, toast) {
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                }],
            ],
        });
    })

    $('.img-upload').change(function(){
        file = this.files[0];
        if (file) {
            reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_img').attr('src', e.target.result);
                $('#preview_img').removeClass('hidden');
            };
            reader.readAsDataURL(file);
            $('#old_img').attr('disabled', 'disabled')
        }
    })

    $('.icon-select').change(function(){
        console.log($(this).val())
        icon = $(this).val()
        $('#selected_icon').removeClass()
        $('#selected_icon').addClass(`fa-solid ${icon} text-white fa-lg`)
    })

    $('#multiple-select').selectize({
        plugins: ["restore_on_backspace", "clear_button", "remove_button"],
    });

    $('#guest_select').selectize();

    $('#guest_select').change(function() {
        guestData = $('#guestData').data('guests')
        idx = $(this).val()

        console.log(guestData[idx].id)

        $('#emailInput').val(guestData[idx].email)
        $('#phoneInput').val(guestData[idx].phone)
        $('#idInput').val(guestData[idx].id)
    })

    $('#find_room').click(function() {
        event.preventDefault();

        startDate = $("#check_in").val();
        endDate = $("#check_out").val();
        $.ajax({
            url: "/ajax/search-rooms", // Replace with your API endpoint
            type: "GET",
            data: {
                check_in: startDate,
                check_out: endDate
            },
            dataType: "json", // The expected data type of the response
            success: function (response) {
                if(response.length > 0){
                    console.log(response)
                } else{
                    console.log("empty")
                }
            },
            error: function (xhr, status, error) {
                // Handle errors
                // $("#result").html("An error occurred: " + error);
            }
        });
    })
});

