var district;
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
                    $("#list_crop").append("<option class='" + element['Crop_name'] + "' id='" + element['id_crop'] + "' value='" + element['Crop_name'] + "'></option>");

                }
            }

        }

    });
    // Get Livestock
    $.ajax({
        method: "GET",
        url: "get/livestock",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (result) {
            // console.log(result);


            for (const key in result) {
                if (result.hasOwnProperty.call(result, key)) {
                    const element = result[key];
                    $("#list_livestock").append("<option class='" + element['name_livestock'] + "' id='" + element['id_livestock'] + "' value='" + element['name_livestock'] + "'></option>");

                }
            }

        }

    });
    // Get District
    $.ajax({
        method: "get",
        url: "get/district",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        success: function (result) {

            district = JSON.parse(result);
            // console.log(district);
        }
    });
    // //////////////////
    // Get Parish
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
    // //////////////////
});
// Btn Trash or Delete a Row from Table
$(document).on("click", '.delete_button', function (event) {
    var row = $(this).parent().parent().parent();
    $(row).remove();


});

// ///////////////////////////////////
// Check Box and Radio Functions
$("input[type=radio]").on("change", function () {
    if ($(this).val() == 1) {
        $("#middleman_table").addClass("d-none");
    }
    else {
        $("#middleman_table").removeClass("d-none");
    }
});
$("#boundary_check").on("change", function () {
    if ($(this).is(":checked")) {
        $("#boundary_table").addClass("d-none");
    }
    else {
        $("#boundary_table").removeClass("d-none");
    }

});
// //////////////////////
$("#parish").on('change', function () {
    $("#district").empty();
    for (const key in district) {
        if (Object.hasOwnProperty.call(district, key)) {
            const element = district[key];
            if (element['id_lv2'] == $(this).val())
                $('#district').append("<option value='" + element['id_lv3'] + "'>" + element['name_lv3'] + "</option>");

        }
    }
});
$("form").submit(function (event) {

    if ($(this).attr('class') == 'farmer_form') {
        $(".spin").removeClass("d-none");
        $(".not_spin").addClass("d-none");
        $("#submit_form_farmer").attr("disabled", "disabled")
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        formData.delete("name_involved");
        formData.delete("last_name_involved");
        formData.delete("parc_num");
        formData.delete("parc_address");
        formData.delete("parc_acreage");
        formData.delete("parc_tenure");
        formData.delete("crop_livestock");
        formData.delete("m_name");
        formData.delete("name_boundary");

        $.ajax({
            url: "insert/farmer",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                // setTimeout(function () {
                //     $('#alert_farmer_page').html("The New User Has Been Registred Succesfully");
                //     $('#alert_farmer_page').removeClass('d-none');
                // }, 2000);
                // $('#alert_farmer_page').addClass('d-none');

                var r = JSON.parse(respuesta);
                setTimeout(function () {
                    insert_otherInvolved(r);

                }, 1000);
                setTimeout(function () {
                    insert_parcel(r);

                }, 1000);
                setTimeout(function () {
                    insert_crop_livestock(r);

                }, 1000);
                if (formData.get('go_market') == 0) {
                    setTimeout(function () {
                        insert_middlemen(r);

                    }, 1000);

                }
                if (formData.get('boundary') != 1) {
                    setTimeout(function () {
                        insert_boundary(r);

                    }, 1000);

                }

            }
        }).done(function () {
            $(".not_spin").removeClass("d-none");
            $(".spin").addClass("d-none");
            $("#submit_form_farmer").attr("disabled", false);
        });;
    }

})
function get_id_crop(name, list) {
    var resp;
    $("#" + list + " option").each(function () {
        // console.log($(this).attr('class'));
        if ($(this).attr('class') == name) {
            // console.log("estoy aqui");
            resp = $(this).attr('id');
        }

    });
    return resp;

}
function insert_boundary(id_farm) {
    $("#tbody_boundary tr").each(function () {

        var name_boundary = $(this).find(".name_boundary").val();

        $.ajax({
            url: "insert/boundary",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {

                'name_boundary': name_boundary,
                'id_farm': id_farm
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });
    });
}
function insert_middlemen(id_farm) {
    $("#tbody_middleman tr").each(function () {

        var m_name = $(this).find(".m_name").val();

        $.ajax({
            url: "insert/m_det",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {

                'm_name': m_name,
                'id_farm': id_farm
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });
    });
}

function insert_crop_livestock(id_farm) {
    $("#tbody_crop tr").each(function () {

        var name_market = $(this).find(".name_market").val();
        var id_crop = get_id_crop($(this).find(".id_crop").val(), 'list_crop');

        $.ajax({
            url: "insert/crop_det",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'id_crop': id_crop,
                'name_market': name_market,
                'id_farm': id_farm
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });
    });
    $("#tbody_livestock tr").each(function () {

        var name_market = $(this).find(".name_market").val();
        var id_livestock = get_id_crop($(this).find(".id_livestock").val(), "list_livestock");

        $.ajax({
            url: "insert/live_det",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'id_livestock': id_livestock,
                'name_market': name_market,
                'id_farm': id_farm
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });
    });
}
function insert_parcel(id_farm) {
    $("#tbody_parcel tr").each(function () {
        var parc_address = $(this).find(".parc_address").val();
        var parc_num = $(this).find(".parc_num").val();
        var parc_acreage = $(this).find(".parc_acreage").val();
        var parc_tenure = $(this).find(".parc_tenure").val();
        var crop_livestock = $(this).find(".crop_livestock").val();
        $.ajax({
            url: "insert/parcel",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'parc_address': parc_address,
                'parc_num': parc_num,
                'parc_acreage': parc_acreage,
                'parc_tenure': parc_tenure,
                'crop_livestock': crop_livestock,
                'id_farm': id_farm
            },
            success: function (respuesta) {

                // console.log(respuesta);
                var r = JSON.parse(respuesta);



            }
        });

    });
}

function insert_otherInvolved(id_farm) {

    $("#tbody_involved tr").each(function () {
        var name = $(this).find(".name_involved").val();
        var last_name = $(this).find(".last_name_involved").val();
        $.ajax({
            url: "insert/otherInvolved",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'name': name,
                'last_name': last_name,
                'id_farm': id_farm
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });

    });
}

// Add Rows Each Table
function add_involded() {
    $("#tbody_involved").append('<tr>' +
        '<td><input type="text" name="name_involved" placeholder="Name" class="form-control name_involved"></td>' +
        '<td><input type="text" name="last_name_involved" placeholder="LastName" class="form-control last_name_involved"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_parcel() {
    $("#tbody_parcel").append('<tr>' +
        '<td><input type="text" name="parc_num" id="" placeholder="" class="form-control parc_num"></td>' +
        '<td><input type="text" name="parc_address" id="" placeholder="" class="form-control parc_address"></td>' +
        '<td><input type="text" name="parc_acreage" id="" placeholder="" class="form-control parc_acreage"></td>' +
        '<td><input type="text" name="parc_tenure" id="" placeholder="" class="form-control parc_tenure"></td>' +
        '<td><input type="text" name="crop_livestock" id="" placeholder="" class="form-control crop_livestock"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_crop() {
    $("#tbody_crop").append('<tr>' +
        '<td><input type="text" name="id_crop" list="list_crop" placeholder="" class="form-control id_crop"></td>' +
        '<td><input type="text" name="name_market" placeholder="" class="form-control name_market"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_livestock() {
    $("#tbody_livestock").append('<tr>' +
        '<td><input type="text" name="id_livestock" list="list_livestock" placeholder="" class="form-control id_livestock"></td>' +
        '<td><input type="text" name="name_market" placeholder="" class="form-control name_market"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_middleman() {
    $("#tbody_middleman").append('<tr>' +
        '<td><input type="text" name="m_name" placeholder="" class="form-control"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_boundary() {
    $("#tbody_boundary").append('<tr>' +
        '<td><input type="text" name="name_boundary" placeholder="" class="form-control"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
// ////////////////////////