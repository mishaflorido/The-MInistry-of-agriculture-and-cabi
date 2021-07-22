var district;
$(document).ready(function () {
    $.ajax({
        method: "get",
        url: "get/district",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        success: function (result) {

            district = JSON.parse(result);
            // console.log(district);
        }
    });
    $.ajax({
        method: "get",
        url: "get/parish",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        success: function (result) {

            // console.log(result);
            var district = JSON.parse(result);

            for (const key in district) {
                if (district.hasOwnProperty(key)) {
                    const element = district[key];
                    $('#parish').append("<option value='" + element['id_lv2'] + "'>" + element['name_lv2'] + "</option>");
                }
            }
        }
    });
});
$("#parish").on('change',function(){
    $("#district").empty();
for (const key in district) {
    if (Object.hasOwnProperty.call(district, key)) {
        const element = district[key];
        if(element['id_lv2']==$(this).val())
        $('#district').append("<option value='" + element['id_lv3'] + "'>" + element['name_lv3'] + "</option>");
        
    }
}
});
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
function add_parcel() {
    $("#tbody_parcel").append('<tr>' +
        '<td><input type="text" name="parc_num" id="" placeholder="" class="form-control"></td>'+
        '<td><input type="text" name="parc_address" id="" placeholder="" class="form-control"></td>'+
        '<td><input type="text" name="parc_acreage" id="" placeholder="" class="form-control"></td>'+
        '<td><input type="text" name="parc_tenure" id="" placeholder="" class="form-control"></td>'+
        '<td><input type="text" name="crop_livestock" id="" placeholder="" class="form-control"></td>'+
        '</tr>');
}
