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
});
