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
// $(document).on('click','add_involved',function(){

//     var fila = document.createElement("tr");
//     var col1 = document.createElement("td");
//     var col2 = document.createElement("td");
//     fila.append(col1);
//     fila.append(col2);
//     $("#tbody_involved").append(fila);



// });
function add_involded() {
    $("#tbody_involved").append('<tr>' +
        '<td><input type="text" name="" id="" placeholder="Name" class="form-control"></td>' +
        '<td><input type="text" name="" id="" placeholder="LastName" class="form-control"></td>' +
        '<td><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
