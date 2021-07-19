$("form").submit(function (event) {
    // console.log($(this).attr('class'));
    if ($(this).attr('class') == 'farmer_form') {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                setTimeout(function () {
                    $('#alert_farmer_page').html("The New User Has Been Registred Succesfully");
                    $('#alert_farmer_page').removeClass('d-none');
                }, 2000);
                $('#alert_farmer_page').addClass('d-none');

                var r = JSON.parse(respuesta);
                // console.log(r,'json');
            }
        });
    }

});
