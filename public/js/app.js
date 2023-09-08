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
});

$(document).click(function(event) {
    if (!$(event.target).closest('.status-chg-btn').length) {
        $('.status-chg-dropdown').addClass('hidden');
    }
})

function deleteRow(target) {
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
                $(`#delete-form-${target}`).submit();
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ],
    });
}