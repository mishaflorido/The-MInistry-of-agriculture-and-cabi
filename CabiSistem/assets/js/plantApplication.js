// VIEW FORM APPLICATION FUNCTIONS////////////////////////////
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
                    $("#var_type").append("<option class='" + element['Crop_name'] + "' id='" + element['id_crop'] + "' value='" + element['Crop_name'] + "'></option>");

                }
            }

        }

    });
    // ////////////////////////////////////
    // LOAD DATATABLE FOR PLANT APPLICATION REPORT
    var p_app;
    $(document).ready(function () {


        p_app = $('#plapp_table_report').DataTable({
            select: {
                style: 'single',
                blurable: true
            },
            stateSave: true,
            dom: 'Bfrtip',
            pagingType: "input",
            buttons: [
                {

                    text: 'PDF',
                    titleAttr: "To PDF",
                    action: function () {
                        var farmer = p_app.row({ selected: true }).data();

                        to_pdf_farmer(farmer);

                    }
                },
                'excel', 'print'
            ],
            ajax: {
                method: "GET",
                url: "get/plant_app",
                dataSrc: ""

            },
            columns: [

                { data: 'name_f' },
                { data: 'id_farm' },
                { data: 'f_addres' },
                { data: 'plt_loc' },
                { data: 'f_phone' },
                { data: 'f_acr' },
                { data: 'f_dst' },
                { data: 'f_date_apl' },
                { data: 'plt_ofc' },
            ],
            columnDefs: [
                {
                    targets: [0],
                    data: 'name_f',
                    render: function (data, type, row) {
                        return "<span>" + data + " " + row.last_name_f + " " + row.mo_last_name + " </span><input class='id_dca_form' type='hidden' name='id_dca_form' value=" + row.id_dca_form + ">"


                    }

                    //     },
                    //     {
                    //         targets: [2],
                    //         data: 'f_sex_dca',
                    //         render: function (data, type, row) {
                    //             return "<span> SEX: &nbsp;" + data + " <br> AGE: " + row.f_age_dca + "</span>"


                    //         }

                    //     },
                    //     {
                    //         targets: [3],
                    //         data: 'name_lv2',
                    //         render: function (data, type, row) {
                    //             return "<span> Sub-County: &nbsp;" + data + " <br> Village: " + row.name_lv3 + "</span>"


                    //         }

                    //     },
                    //     {
                    //         targets: [4],
                    //         data: 'Crop_name',
                    //         render: function (data, type, row) {
                    //             return "<span> Crop: &nbsp;" + data + " <br> Variety: " + row.name_variety + "</span>"


                    //         }

                    //     },
                    //     // {
                    //     //     targets: [6],
                    //     //     data: 'sex',
                    //     //     render: function (data, type, row) {
                    //     //         if (data == 1) {
                    //     //             return "<span>Female</span>"
                    //     //         }
                    //     //         if (data == 2) {
                    //     //             return "<span>Male</span>"
                    //     //         }


                    //     //     }

                },



            ]
        });

    });
    // ///////////////////////////////
})
function add_plant_apply() {

    $('#tbody_plant_aplication').append('<tr>' +
        '<td><input list="var_type" name="plant_crop" class="form-control plant_crop"></td>' +
        '<td><input type="text" name="plant_req" placeholder="" class="form-control plant_req"></td>' +
        '<td><input type="text" name="plant_recom" placeholder="" class="form-control plant_recom"></td>' +
        '<td><input type="text" name="plant_approv" placeholder="" class="form-control plant_approv"></td>' +
        '<td><input type="text" name="plant_received" placeholder="" class="form-control plant_received"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_preplnt() {

    $('#tbody_pre_pln_inspection').append('<tr>' +
        '<td><input type="date" name="pre_date_visit" placeholder="" class="form-control pre_date_visit"></td>' +
        '<td><input type="text" name="pre_com" placeholder="" class="form-control pre_com"></td>' +
        '<td><input type="text" name="extn_officeer" placeholder="" class="form-control extn_officeer"></td>' +
        '<td><input type="text" name="supervisor" placeholder="" class="form-control supervisor"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_pstplnt() {

    $('#tbody_pst_pln_inspection').append('<tr>' +
        '<td><input type="date" name="pos_date_visit" placeholder="" class="form-control pos_date_visit"></td>' +
        '<td><input type="text" name="pos_Comments" placeholder="" class="form-control pos_Comments"></td>' +
        '<td><input type="text" name="extn_officeer_post" placeholder="" class="form-control extn_officeer_post"></td>' +
        '<td><input type="text" name="supervisor_post" placeholder="" class="form-control supervisor_post"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_fut_dev() {

    $('#tbody_fut_dev').append('<tr>' +
        '<td><input type="text" name="fut_dev" placeholder="" class="form-control fut_dev"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
$("form").submit(function (event) {

    if ($(this).attr('class') == 'plant_application') {
        event.preventDefault();
        show_spin("btn_plant_app", "spin_papp", "not_spin_plant");

        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "insert/plant_application",
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
                    insert_plant_application_table(r);
                }, 1000);
                setTimeout(function () {
                    insert_pre_plant_insp(r);

                }, 1000);
                setTimeout(function () {
                    insert_post_plant_insp(r);

                }, 1000);
                setTimeout(function () {
                    future_development(r);

                }, 1000);


            }
        }).done(function () {
            hide_spin("btn_plant_app", "spin_papp", "not_spin_plant");
            $('#alert_plant_application').html("The Plant Application Form Has Been Registred Succesfully");
            $('#alert_plant_application').removeClass('d-none');
        });
    }

})
function insert_plant_application_table(id_plant_apply) {

    $("#tbody_plant_aplication tr").each(function () {
        var plant_crop = get_id_crop($(this).find(".plant_crop").val(), 'var_type');
        var plant_req = $(this).find(".plant_req").val();
        var plant_recom = $(this).find(".plant_recom").val();
        var plant_approv = $(this).find(".plant_approv").val();
        var plant_received = $(this).find(".plant_received").val();
        $.ajax({
            url: "insert/plant_application_table",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'plant_crop': plant_crop,
                'plant_req': plant_req,
                'plant_recom': plant_recom,
                'plant_approv': plant_approv,
                'plant_received': plant_received,
                'id_plant_apply': id_plant_apply
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });

    });
}
function insert_pre_plant_insp(id_plant_apply) {

    $("#tbody_pre_pln_inspection tr").each(function () {

        var pre_date_visit = $(this).find(".pre_date_visit").val();
        var pre_com = $(this).find(".pre_com").val();
        var extn_officeer = $(this).find(".extn_officeer").val();
        var supervisor = $(this).find(".supervisor").val();
        $.ajax({
            url: "insert/pre_plant_insp",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'pre_date_visit': pre_date_visit,
                'pre_com': pre_com,
                'extn_officeer': extn_officeer,
                'supervisor': supervisor,
                'id_plant_apply': id_plant_apply
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });

    });
}
function insert_post_plant_insp(id_plant_apply) {

    $("#tbody_pst_pln_inspection tr").each(function () {

        var pos_date_visit = $(this).find(".pos_date_visit").val();
        var pos_Comments = $(this).find(".pos_Comments").val();
        var extn_officeer_post = $(this).find(".extn_officeer_post").val();
        var supervisor_post = $(this).find(".supervisor_post").val();
        $.ajax({
            url: "insert/post_plant_insp",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'pos_date_visit': pos_date_visit,
                'pos_Comments': pos_Comments,
                'extn_officeer_post': extn_officeer_post,
                'supervisor_post': supervisor_post,
                'id_plant_apply': id_plant_apply
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });

    });
}
function future_development(id_plant_apply) {

    $("#tbody_fut_dev tr").each(function () {

        var fut_dev = $(this).find(".fut_dev").val();

        $.ajax({
            url: "insert/future_development",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'fut_dev': fut_dev,
                'id_plant_apply': id_plant_apply
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });

    });
}
// VIEW PLANT APPLICATION REPORT FUNCTIONS////////////////////////////
