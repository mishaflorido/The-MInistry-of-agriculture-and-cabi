var p_app_table;
var aux_papp_tb1;
var aux_papp_tb2;
var aux_papp_tb3;
var aux_papp_tb4;
// VIEW FORM APPLICATION FUNCTIONS////////////////////////////
// Filled Empty Input Data
function filledEmptyInputPAP() {
    $(".plant_application input[type='date']").val('');
    $(".plant_application input[type='text']").val('');
    $(".plant_application input[type='hidden']").val('');
    $("#tbody_plant_aplication").empty();
    $("#tbody_plant_aplication").append(`
      <tr>
        <td>
        <input list="var_type" name="plant_crop" class="form-control plant_crop">
           <datalist id="var_type">

          </datalist>
         </td>
         <td><input type="text" name="plant_req" placeholder="" class="form-control plant_req"></td>
          <td><input type="text" name="plant_recom" placeholder="" class="form-control plant_recom"></td>
          <td><input type="text" name="plant_approv" placeholder="" class="form-control plant_approv"></td>
         <td><input type="text" name="plant_received" placeholder="" class="form-control plant_received"></td>
         <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     </tr>
    `);
    getVarietyPAP();
    $("#tbody_pre_pln_inspection").empty();
    $("#tbody_pre_pln_inspection").append(`
       <tr>
            <td><input type="date" name="pre_date_visit" placeholder="" class="form-control pre_date_visit"></td>
            <td><input type="text" name="pre_com" placeholder="" class="form-control pre_com"></td>
            <td><input type="text" name="extn_officeer" placeholder="" class="form-control extn_officeer"></td>
             <td><input type="text" name="supervisor" placeholder="" class="form-control supervisor"></td>
            <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        </tr>
    `);
    $("#tbody_pst_pln_inspection").empty();
    $("#tbody_pst_pln_inspection").append(`
      <tr>
        <td><input type="date" name="pos_date_visit" placeholder="" class="form-control pos_date_visit"></td>
        <td><input type="text" name="pos_Comments" placeholder="" class="form-control pos_Comments"></td>
         <td><input type="text" name="extn_officeer_post" placeholder="" class="form-control extn_officeer_post"></td>
         <td><input type="text" name="supervisor_post" placeholder="" class="form-control supervisor_post"></td>
         <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     </tr>
    `);
    $("#tbody_fut_dev").empty();
    $("#tbody_fut_dev").append(`
      <tr>
        <td><input type="text" name="fut_dev" placeholder="" class="form-control fut_dev"></td>
        <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     </tr>
    `);

}

// //////////////////////
// Get Variety 
function getVarietyPAP() {
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
}
// //////////////
$(document).ready(function () {
    setInterval(function () {
        p_app_table.ajax.reload();
    }, 180000);
    // Get Crop
    getVarietyPAP();
    // ////////////////////////////////////
    // LOAD DATATABLE FOR PLANT APPLICATION REPORT



    p_app_table = $('#plapp_table_report').DataTable({
        select: {
            style: 'single',
            blurable: true
        },
        stateSave: true,
        dom: 'Bfrtip',
        pagingType: "input",
        buttons: [
            {

                text: 'Individual form print',
                titleAttr: "To PDF",
                action: function () {
                    var farmer = p_app_table.row({ selected: true }).data();
                    // get_papp_tb1(farmer.id_plant_apply);
                    if (farmer == null) {
                        alert("Please select a row to create PDF");
                    } else {
                        to_pdf_pappform(farmer);
                    }

                }
            },
            {
                extend: 'print',
                text: "Print Table"
            },
            {

                text: 'Edit Row',
                titleAttr: "Edit register",
                action: function () {
                    var dca = p_app_table.row({ selected: true }).data();
                    if (dca == null) {
                        alert("Please select a row to Edit");
                    }
                    else {
                        edit_row_plantApplications(dca);
                    }

                }
            },
            {
                extend: 'excel',
                text: 'Excel'
            }
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
            },



        ]
    });


    // ///////////////////////////////
})
function get_papp_tb1(id_plant_apply) {
    $('#papp_tb1').empty();
    $.ajax({
        url: "get/plant_apply_tb1",
        type: "POST",
        data: {
            "id_plant_apply": id_plant_apply,
        },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (respuesta) {
            // var r = JSON.parse(respuesta);
            aux_papp_tb1 = respuesta;
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {

                    const element = respuesta[key];
                    // console.log(element);
                    $('#papp_tb1').append("<tr>" +
                        "<td>" + element['Crop_name'] + "</td>" +
                        "<td>" + element['plant_req'] + "</td>" +
                        "<td>" + element['plant_recom'] + "</td>" +
                        "<td>" + element['plant_approv'] + "</td>" +
                        "<td>" + element['plant_received'] + "</td>" +
                        "</tr>");

                }

            }
        }

    })

}
function get_papp_tb2(id_plant_apply) {
    $('#papp_tb2').empty();
    $.ajax({
        url: "get/plant_apply_tb2",
        type: "POST",
        data: {
            "id_plant_apply": id_plant_apply,
        },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (respuesta) {
            aux_papp_tb2 = respuesta;
            // var r = JSON.parse(respuesta);
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    // console.log(element);
                    $('#papp_tb2').append("<tr>" +
                        "<td>" + element['pre_date_visit'] + "</td>" +
                        "<td>" + element['pre_com'] + "</td>" +
                        "<td>" + element['extn_officeer'] + "</td>" +
                        "<td>" + element['supervisor'] + "</td>" +
                        "</tr>");

                }

            }
        }

    })

}
function get_papp_tb3(id_plant_apply) {
    $('#papp_tb3').empty();
    $.ajax({
        url: "get/plant_apply_tb3",
        type: "POST",
        data: {
            "id_plant_apply": id_plant_apply,
        },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (respuesta) {
            aux_papp_tb3 = respuesta;
            // var r = JSON.parse(respuesta);
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    // console.log(element);
                    $('#papp_tb3').append("<tr>" +
                        "<td>" + element['pos_date_visit'] + "</td>" +
                        "<td>" + element['pos_Comments'] + "</td>" +
                        "<td>" + element['extn_officeer_post'] + "</td>" +
                        "<td>" + element['supervisor_post'] + "</td>" +
                        "</tr>");

                }

            }
        }

    })

}
function get_papp_tb4(id_plant_apply) {
    $('#papp_tb4').empty();
    $.ajax({
        url: "get/plant_apply_tb4",
        type: "POST",
        data: {
            "id_plant_apply": id_plant_apply,
        },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (respuesta) {
            aux_papp_tb4 = respuesta;
            // var r = JSON.parse(respuesta);
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    // console.log(element);
                    $('#papp_tb4').append("<tr>" +
                        "<td>" + element['fut_dev'] + "</td>" +
                        "</tr>");

                }

            }
        }

    })

}
$(document).on("click", "#tbody_plapp_report tr", function () {
    var crop = p_app_table.row({ selected: true }).data();
    get_papp_tb1(crop["id_plant_apply"]);
    get_papp_tb2(crop["id_plant_apply"]);
    get_papp_tb3(crop["id_plant_apply"]);
    get_papp_tb4(crop["id_plant_apply"]);
})
function to_pdf_pappform(papp) {
    let doc = new jsPDF('p', 'pt', 'a4');

    // Header to print variables

    doc.setFontType('bold');
    doc.setFontSize(20)
    doc.text(150, 30, 'MINISTRY OF AGRICULTURE');
    doc.setFontType('normal');
    doc.text(170, 55, 'PLANT APLICATION FORM');
    doc.setFontSize(12)
    doc.text(30, 80, 'Name of farmer: ' + papp['name_f'] + " " + papp['last_name_f'] + " " + papp['mo_last_name']);
    doc.text(350, 80, 'MOA Farmer´s ID.#: ' + papp['id_farm']);
    doc.text(30, 105, 'Address: ' + papp['f_addres']);
    doc.text(350, 105, 'Locations of plots: ' + papp['plt_loc']);
    doc.text(30, 130, 'Tel. No.: ' + papp['f_phone']);
    doc.text(180, 130, 'Acreage: ' + papp['f_acr']);
    doc.text(350, 130, 'Ext´n District: ' + papp['f_dst']);
    doc.text(30, 190, 'Date applied: ' + papp['f_date_apl']);
    doc.text(340, 190, 'Extension officer: ' + papp['plt_ofc']);
    // put here the first table
    doc.rect(30, 200, 535, 20, "S");
    doc.setFillColor(48, 170, 76);
    doc.rect(198, 200.5, 270, 19, "F");
    doc.setFontSize("10");
    doc.setTextColor(255, 255, 255);
    doc.text(290, 215, "QUANTITY");
    var res = doc.autoTableHtmlToJson(document.getElementById("papp_t1"));
    doc.autoTable(res.columns, res.data, {
        startY: 221,
        tableLineColor: 200,
        tableLineWidth: 0,
        margin: { horizontal: 30 },
        styles: { overflow: 'linebreak' },
        headerStyles: { fillColor: '#30aa4c', },
        columnStyles: {
            0: { columnWidth: 170 },
            1: { columnWidth: 90 },
            2: { columnWidth: 90 },
            3: { columnWidth: 90 },
        },
        theme: "grid"
    });


    //Footer of the first table
    doc.setFontType('bold');
    doc.setFontSize(8)
    doc.text(30, doc.autoTableEndPosY() + 10, '‘Quantity Recommended’ to be done by Extension Officer; ‘Quantity Approved’ to be done by Agronomy Division ');
    doc.text(90, doc.autoTableEndPosY() + 30, 'NB: Forms to be submitted to the Extension Officer to reach Agronomy Division no later than September 15');
    doc.setFontType('normal');
    doc.text(150, doc.autoTableEndPosY() + 40, ' (Please note the date the form has been received from the applicant) ');


    // next page
    doc.addPage("letter", "l")
    doc.setFontSize(10)
    doc.text(30, 30, 'To be completed by Extension Officer:');
    doc.text(30, 50, '1. Pre-planting inspection: (eg. Area cleared, status of lining of plots, drains, establishment of shade, holes dug, etc)');
    // // put here the second table
    doc.rect(30, 55, 635, 20, "S");
    doc.setFillColor(48, 170, 76);
    doc.rect(485, 55.5, 277, 19, "F");
    doc.setFontSize("10");
    doc.setTextColor(255, 255, 255);
    doc.setFontType('bold');
    doc.text(590, 70, "Signed by:");
    var res = doc.autoTableHtmlToJson(document.getElementById("papp_t2"));
    doc.autoTable(res.columns, res.data, {
        startY: 76,
        tableLineColor: 200,
        tableLineWidth: 0,
        margin: { horizontal: 30 },
        styles: { overflow: 'linebreak' },
        headerStyles: { fillColor: '#30aa4c', },
        columnStyles: {
            0: { columnWidth: 80 },
            1: { columnWidth: 377 },
        },
        theme: "grid"
    });
    doc.setFontType('normal');
    doc.text(30, doc.autoTableEndPosY() + 20, '2. Post-planting inspection: (eg. Plants planted; field condition – weeds, rootstock growth;  pests & diseases ; # of deaths; cause  of death, etc.)');
    // // put here the third table
    doc.rect(30, doc.autoTableEndPosY() + 25, 635, 20, "S");
    doc.setFillColor(48, 170, 76);
    doc.rect(485, doc.autoTableEndPosY() + 25.5, 277, 19, "F");
    doc.setFontSize("10");
    doc.setTextColor(255, 255, 255);
    doc.setFontType('bold');
    doc.text(590, doc.autoTableEndPosY() + 40, "Signed by:");
    var res = doc.autoTableHtmlToJson(document.getElementById("papp_t3"));
    doc.autoTable(res.columns, res.data, {
        startY: doc.autoTableEndPosY() + 45.5,
        tableLineColor: 200,
        tableLineWidth: 0,
        margin: { horizontal: 30 },
        styles: { overflow: 'linebreak' },
        headerStyles: { fillColor: '#30aa4c', },
        columnStyles: {
            0: { columnWidth: 80 },
            1: { columnWidth: 377 },
        },
        theme: "grid"
    });



    doc.setFontType('normal');
    doc.text(30, doc.autoTableEndPosY() + 20, '3. Potential for Future Development: (eg. Plans for expansion, overall plan for farm, etc.)');
    var res = doc.autoTableHtmlToJson(document.getElementById("papp_t4"));
    doc.autoTable(res.columns, res.data, {
        startY: doc.autoTableEndPosY() + 21,
        tableLineColor: 200,
        tableLineWidth: 0,
        margin: { horizontal: 30 },
        styles: { overflow: 'linebreak' },
        headerStyles: { fillColor: '#FFFFFF' },
        columnStyles: {
            text: { columnWidth: 'auto' },
            nil: { halign: 'right' },
            tgl: { halign: 'right' }
        },
        theme: "grid"
    });

    doc.text(30, doc.internal.pageSize.height - 20, 'Extension Officer: ______________________________	Date:________________________');

    window.open(doc.output('bloburl'));
}






function add_plant_apply() {

    $('#tbody_plant_aplication').append('<tr>' +
        '<td> <input type="hidden" name="id_papply_tb"><input list="var_type" name="plant_crop" class="form-control plant_crop"></td>' +
        '<td><input type="text" name="plant_req" placeholder="" class="form-control plant_req"></td>' +
        '<td><input type="text" name="plant_recom" placeholder="" class="form-control plant_recom"></td>' +
        '<td><input type="text" name="plant_approv" placeholder="" class="form-control plant_approv"></td>' +
        '<td><input type="text" name="plant_received" placeholder="" class="form-control plant_received"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_preplnt() {

    $('#tbody_pre_pln_inspection').append('<tr>' +
        '<td><input type="hidden" name="id_preplins"><input type="date" name="pre_date_visit" placeholder="" class="form-control pre_date_visit"></td>' +
        '<td><input type="text" name="pre_com" placeholder="" class="form-control pre_com"></td>' +
        '<td><input type="text" name="extn_officeer" placeholder="" class="form-control extn_officeer"></td>' +
        '<td><input type="text" name="supervisor" placeholder="" class="form-control supervisor"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_pstplnt() {

    $('#tbody_pst_pln_inspection').append('<tr>' +
        '<td><input type="hidden" name="id_postplins"><input type="date" name="pos_date_visit" placeholder="" class="form-control pos_date_visit"></td>' +
        '<td><input type="text" name="pos_Comments" placeholder="" class="form-control pos_Comments"></td>' +
        '<td><input type="text" name="extn_officeer_post" placeholder="" class="form-control extn_officeer_post"></td>' +
        '<td><input type="text" name="supervisor_post" placeholder="" class="form-control supervisor_post"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_fut_dev() {

    $('#tbody_fut_dev').append('<tr>' +
        '<td><input type="hidden" name="id_fut_dev"><input type="text" name="fut_dev" placeholder="" class="form-control fut_dev"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
$("form").submit(function (event) {

    if ($(this).attr('class') == 'plant_application') {
        event.preventDefault();
        show_spin("btn_plant_app", "spin_papp", "not_spin_plant");

        var formData = new FormData($(this)[0]);
        var url_variable_papp;
        if ($("input[name='id_plant_apply']").val() != '') {
            url_variable_papp = "update/plant_application";
        }
        else {
            url_variable_papp = "insert/plant_application";
        }

        $.ajax({
            url: url_variable_papp,
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
            p_app_table.ajax.reload();
            setTimeout(function () {
                hide_spin("btn_plant_app", "spin_papp", "not_spin_plant");
                $('#alert_plant_application').html("The Plant Application Form Has Been Registred Succesfully");
                $('#alert_plant_application').removeClass('d-none');

                filledEmptyInputPAP();

            }, 1000);
        });
    }

})
function insert_plant_application_table(id_plant_apply) {
    console.log("insert_plant_application_table");
    var url_papp_tb1;
    if ($("input[name='id_papply_tb']").val() != '') {
        url_papp_tb1 = "update/plant_application_table";
        // console.log("update", $("input[name='id_papply_tb']").val());
    }
    else {
        console.log("insert", $("input[name='id_papply_tb']").val());
        url_papp_tb1 = "insert/plant_application_table";
    }
    $("#tbody_plant_aplication tr").each(function () {
        var id_papply_tb = $(this).find("input[name='id_papply_tb']").val();
        var plant_crop = get_id_crop($(this).find(".plant_crop").val(), 'var_type');
        var plant_req = $(this).find(".plant_req").val();
        var plant_recom = $(this).find(".plant_recom").val();
        var plant_approv = $(this).find(".plant_approv").val();
        var plant_received = $(this).find(".plant_received").val();
        $.ajax({
            url: url_papp_tb1,
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'id_papply_tb': id_papply_tb,
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

    var url_papp_tb2;
    if ($("input[name='id_preplins']").val() != '') {
        url_papp_tb2 = "update/pre_plant_insp";
    }
    else {
        url_papp_tb2 = "insert/pre_plant_insp";
    }
    $("#tbody_pre_pln_inspection tr").each(function () {

        var id_preplins = $(this).find("input[name='id_preplins']").val();
        var pre_date_visit = $(this).find(".pre_date_visit").val();
        var pre_com = $(this).find(".pre_com").val();
        var extn_officeer = $(this).find(".extn_officeer").val();
        var supervisor = $(this).find(".supervisor").val();
        $.ajax({
            url: url_papp_tb2,
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'id_preplins': id_preplins,
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
    var url_papp_tb3;
    if ($("input[name='id_postplins']").val() != '') {
        url_papp_tb3 = "update/post_plant_insp";
    }
    else {
        url_papp_tb3 = "insert/post_plant_insp";
    }

    $("#tbody_pst_pln_inspection tr").each(function () {

        var id_postplins = $(this).find("input[name='id_postplins']").val();
        var pos_date_visit = $(this).find(".pos_date_visit").val();
        var pos_Comments = $(this).find(".pos_Comments").val();
        var extn_officeer_post = $(this).find(".extn_officeer_post").val();
        var supervisor_post = $(this).find(".supervisor_post").val();
        $.ajax({
            url: url_papp_tb3,
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'id_postplins': id_postplins,
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
    var url_papp_tb4;
    if ($("input[name='id_fut_dev']").val() != '') {
        url_papp_tb4 = "update/future_development";
    }
    else {
        url_papp_tb4 = "insert/future_development";
    }
    $("#tbody_fut_dev tr").each(function () {

        var id_fut_dev = $(this).find("input[name='id_fut_dev']").val();
        var fut_dev = $(this).find(".fut_dev").val();

        $.ajax({
            url: url_papp_tb4,
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'id_fut_dev': id_fut_dev,
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
// EDIT ROW FUNCTIONS
function edit_row_plantApplications(data) {
    $("#plant_application").collapse("toggle");
    $(".plant_application input[name='id_plant_apply']").val(data['id_plant_apply']);
    $(".plant_application input[name='name_f']").val(data['name_f']);
    $(".plant_application input[name='last_name_f']").val(data['last_name_f']);
    $(".plant_application input[name='mo_last_name']").val(data['mo_last_name']);
    $(".plant_application input[name='id_farm']").val(data['id_farm']);
    $(".plant_application input[name='f_addres']").val(data['f_addres']);
    $(".plant_application input[name='plt_loc']").val(data['plt_loc']);
    $(".plant_application input[name='f_phone']").val(data['f_phone']);
    $(".plant_application input[name='f_acr']").val(data['f_acr']);
    $(".plant_application input[name='f_dst']").val(data['f_dst']);
    $(".plant_application input[name='f_date_apl']").val(data['f_date_apl']);
    $(".plant_application input[name='plt_ofc']").val(data['plt_ofc']);
    $("#tbody_plant_aplication").empty();
    for (const key in aux_papp_tb1) {
        if (Object.hasOwnProperty.call(aux_papp_tb1, key)) {
            const element = aux_papp_tb1[key];
            $('#tbody_plant_aplication').append(`<tr>
                <td>
                <input type="hidden" name="id_papply_tb" value="${element['id_papply_tb']}">
                <input list="var_type" name="plant_crop" class="form-control plant_crop" value="${element['Crop_name']}">
              
                </td>
                <td><input type="text" name="plant_req" placeholder="" class="form-control plant_req" value="${element['plant_req']}"></td>
                <td><input type="text" name="plant_recom" placeholder="" class="form-control plant_recom" value="${element['plant_recom']}"></td>
                <td><input type="text" name="plant_approv" placeholder="" class="form-control plant_approv" value="${element['plant_approv']}"></td>
                <td><input type="text" name="plant_received" placeholder="" class="form-control plant_received" value="${element['plant_received']}"></td>
                <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>`);
        }
    }
    $('#tbody_plant_aplication').append(`<datalist id="var_type"></datalist>`);
    getVarietyPAP();
    $("#tbody_pre_pln_inspection").empty();
    // console.log(aux_papp_tb2);
    for (const key in aux_papp_tb2) {
        if (Object.hasOwnProperty.call(aux_papp_tb2, key)) {
            const element = aux_papp_tb2[key];
            $('#tbody_pre_pln_inspection').append(`<tr>
            <td><input type="hidden" name="id_preplins" value="${element['id_preplins']}"><input type="date" name="pre_date_visit" placeholder="" class="form-control pre_date_visit" value="${element['pre_date_visit']}"></td>
            <td><input type="text" name="pre_com" placeholder="" class="form-control pre_com" value="${element['pre_com']}"></td>
            <td><input type="text" name="extn_officeer" placeholder="" class="form-control extn_officeer" value="${element['extn_officeer']}"></td>
            <td><input type="text" name="supervisor" placeholder="" class="form-control supervisor" value="${element['supervisor']}"></td>
            <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>`);
        }
    };
    $("#tbody_pst_pln_inspection").empty();
    // console.log(aux_papp_tb3);
    for (const key in aux_papp_tb3) {
        if (Object.hasOwnProperty.call(aux_papp_tb3, key)) {
            const element = aux_papp_tb3[key];
            $('#tbody_pst_pln_inspection').append(`<tr>
            <td><input type="hidden" name="id_postplins" value="${element['id_postplins']}"><input type="date" name="pos_date_visit" placeholder="" class="form-control pos_date_visit" value="${element['pos_date_visit']}"></td>
            <td><input type="text" name="pos_Comments" placeholder="" class="form-control pos_Comments" value="${element['pos_Comments']}"></td>
            <td><input type="text" name="extn_officeer_post" placeholder="" class="form-control extn_officeer_post" value="${element['extn_officeer_post']}"></td>
            <td><input type="text" name="supervisor_post" placeholder="" class="form-control supervisor_post" value="${element['pre_date_vissupervisor_postit']}"></td>
            <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>`);
        }
    }
    $("#tbody_fut_dev").empty();
    // console.log(aux_papp_tb3);
    for (const key in aux_papp_tb4) {
        if (Object.hasOwnProperty.call(aux_papp_tb4, key)) {
            const element = aux_papp_tb4[key];
            $('#tbody_fut_dev').append(`<tr>
            <td><input type="hidden" name="id_fut_dev" value="${element['id_fut_dev']}"><input type="text" name="fut_dev" placeholder="" class="form-control fut_dev" value="${element['fut_dev']}"></td>
            <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>`);
        }
    }

}
