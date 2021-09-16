$(document).ready(function () {
    // Get Crop
    $.ajax({
        method: "GET",
        url: "get/crop",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (result) {
            // console.log(result);


            for (const key in result) {
                if (result.hasOwnProperty.call(result, key)) {
                    const element = result[key];
                    $("#crop_pestapp_list").append("<option class='" + element['Crop_name'] + "' id='" + element['id_crop'] + "' value='" + element['Crop_name'] + "'></option>");

                }
            }

        }

    });
})
function add_pesticide() {

    $('#tbody_pesticide').append('<tr>' +
        '<td><textarea name="inf_far" placeholder="" class="form-control inf_far" rows="1"> </textarea></td>' +
        '<td><input type="date" name="date_pestapp" placeholder="" class="form-control date_pestapp" style="width: 100px;"></td>' +
        '<td><input list="crop_pestapp_list" name="crop_pestapp" placeholder="" class="form-control crop_pestapp">' +
        '<datalist id="crop_pestapp_list"></datalist>' +
        '</td>' +
        '<td><input type="text" name="plsi_pestapp" placeholder="" class="form-control plsi_pestapp"></td>' +
        '<td><input type="text" name="targ_pestapp" placeholder="" class="form-control targ_pestapp"></td>' +
        '<td><input type="text" name="pest_pestapp" placeholder="" class="form-control pest_pestapp"></td>' +
        '<td><input type="text" name="rate_pestapp" placeholder="" class="form-control rate_pestapp"> </td>' +
        '<td><input type="text" name="amt_pestapp" placeholder="" class="form-control amt_pestapp"></td>' +
        '<td><textarea name="com_pestapp" placeholder="" class="form-control com_pestapp" rows="1"></textarea></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
$("#btn_pestapp").on('click', function () {
    show_spin("btn_pestapp", "spin_pestapp", "not_spin_pestapp");
    $("#tbody_pesticide tr").each(function () {
        var spsig_pestapp = $('#spsig_pestapp').val();

        var inf_far = $(this).find(".inf_far").val();
        var date_pestapp = $(this).find(".date_pestapp").val();
        var crop_pestapp = get_id_crop($(this).find(".crop_pestapp").val(), 'crop_pestapp_list');
        var plsi_pestapp = $(this).find(".plsi_pestapp").val();
        var targ_pestapp = $(this).find(".targ_pestapp").val();
        var pest_pestapp = $(this).find(".pest_pestapp").val();
        var rate_pestapp = $(this).find(".rate_pestapp").val();
        var amt_pestapp = $(this).find(".amt_pestapp").val();
        var com_pestapp = $(this).find(".com_pestapp").val();
        $.ajax({
            url: "insert/pest_app",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'spsig_pestapp': spsig_pestapp,
                'inf_far': inf_far,
                'date_pestapp': date_pestapp,
                'crop_pestapp': crop_pestapp,
                'plsi_pestapp': plsi_pestapp,
                'targ_pestapp': targ_pestapp,
                'pest_pestapp': pest_pestapp,
                'rate_pestapp': rate_pestapp,
                'amt_pestapp': amt_pestapp,
                'com_pestapp': com_pestapp,
            },
            success: function (respuesta) {
                console.log(respuesta);
            }
        }).done(function () {
            hide_spin("btn_pestapp", "spin_pestapp", "not_spin_pestapp");
            $('#alert_pestapp').html("The Pesticide Field Record Form Has Been Registred Succesfully");
            $('#alert_pestapp').removeClass('d-none');
        });;

    });
});
function get_id_crop(name, list) {
    var resp;
    $("#" + list + " option").each(function () {
        // console.log($(this).attr('class') + "Clase," + name + "nombre");
        if ($(this).attr('class') == name) {
            // console.log("estoy aqui");
            resp = $(this).attr('id');
        }

    });
    // console.log(resp + 'Esta es el id crop');
    return resp;

}