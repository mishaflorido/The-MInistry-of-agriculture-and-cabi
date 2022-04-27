var pestapp_table;
var table_pestapp_toedit;
// Filled Empty Input Data

function fillEmptyInputDataPESTAPP() {
    $(".frm_pestapp input[type='text']").val('');
    $("#tbody_pesticide").empty();
    $("#tbody_pesticide").append(`
      <tr>
     <td><textarea name="inf_far" placeholder="" class="form-control inf_far" rows="1"> </textarea></td>
       <td><input type="date" name="date_pestapp" placeholder="" class="form-control date_pestapp" style="width: 100px;"></td>
       <td><input list="crop_pestapp_list" name="crop_pestapp" placeholder="" class="form-control crop_pestapp">
          <datalist id="crop_pestapp_list"></datalist>
      </td>
      <td><input type="text" name="plsi_pestapp" placeholder="" class="form-control plsi_pestapp"></td>
       <td><input type="text" name="targ_pestapp" placeholder="" class="form-control targ_pestapp"></td>
     <td><input type="text" name="pest_pestapp" placeholder="" class="form-control pest_pestapp"></td>
     <td><input type="text" name="rate_pestapp" placeholder="" class="form-control rate_pestapp"> </td>
      <td><input type="text" name="amt_pestapp" placeholder="" class="form-control amt_pestapp"></td>
      <td><textarea name="com_pestapp" placeholder="" class="form-control com_pestapp" rows="1"></textarea></td>
     <td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>
 </tr>
    `);
    get_cropPestapp();


}
// Get Crop
function get_cropPestapp() {
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
}

// ////////////////////
$(document).ready(function () {
    setInterval(function () {
        pestapp_table.ajax.reload();
    }, 180000);
    get_cropPestapp();
    pestapp_table = $('#pestapp_table_report').DataTable({
        // select: {
        //     style: 'single',
        //     blurable: true
        // },
        stateSave: true,
        dom: 'Bfrtip',
        pagingType: "input",
        buttons: [
            {

                text: 'Individual form print',
                titleAttr: "To PDF",
                action: function () {

                    if ($("#f_date").val() != '' && $("#l_date").val() != '' && $("#sup_sig_pdf").val() != '') {
                        to_pdf_pestappform($("#sup_sig_pdf").val());
                    }
                    else {
                        alert("Please entrer the completed information (First Date, Last Date, Supervisor Signature)");
                    }

                }
            },
            {

                text: 'Edit Row',
                titleAttr: "Edit register",
                action: function () {

                    if ($("#f_date").val() != '' && $("#l_date").val() != '' && $("#sup_sig_pdf").val() != '') {
                        to_edit_pestapp($("#sup_sig_pdf").val());
                    }
                    else {
                        alert("Please entrer the completed information (First Date, Last Date, Supervisor Signature)");
                    }

                }
            },
            {
                extend: 'excel',
                text: 'Excel'
            },
            {
                extend: 'print',
                text: "Print Table"
            }
        ],
        ajax: {
            method: "GET",
            url: "get/pest_app",
            dataSrc: ""

        },
        columns: [

            { data: 'spsig_pestapp' },
            { data: 'inf_far' },
            { data: 'date_pestapp' },
            { data: 'com_pestapp' },

        ],

    });

})
$(document).on("change", ".to_search", function () {
    // console.log("busqueda");
    get_between_datepestapp();
})
function get_between_datepestapp() {
    $("#pestapp_tb1").empty();
    var f_date = $("#f_date").val();
    var l_date = $("#l_date").val();
    var sup_sig_pdf = $("#sup_sig_pdf").val();
    $.ajax({
        url: "get/pest_app_betweendate",
        type: "POST",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        data: {
            'f_date': f_date,
            'l_date': l_date,
            'sup_sig_pdf': sup_sig_pdf,

        },
        success: function (respuesta) {
            table_pestapp_toedit = respuesta;
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    console.log(element);
                    $('#pestapp_tb1').append("<tr>" +
                        "<td>" + element['inf_far'] + "</td>" +
                        "<td>" + element['date_pestapp'] + "</td>" +
                        "<td>" + element['crop_pestapp'] + "</td>" +
                        "<td>" + element['plsi_pestapp'] + "</td>" +
                        "<td>" + element['targ_pestapp'] + "</td>" +
                        "<td>" + element['pest_pestapp'] + "</td>" +
                        "<td>" + element['rate_pestapp'] + "</td>" +
                        "<td>" + element['amt_pestapp'] + "</td>" +
                        "<td>" + element['com_pestapp'] + "</td>" +
                        "</tr>");

                }

            }
        }
    })
}
function to_pdf_pestappform() {
    let doc = new jsPDF('p', 'pt', 'a4');
    doc.setFontType('bold');
    doc.setFontSize(16)
    doc.text(120, 30, 'Pest Management Unit, Ministry of Agriculture');
    doc.setFontType('normal');
    doc.text(140, 55, 'Pesticide Application – Field Record Sheet');
    doc.setFontSize(12)
    var res = doc.autoTableHtmlToJson(document.getElementById("pestapp_t1"));
    doc.autoTable(res.columns, res.data, {
        startY: 70,
        tableLineColor: 200,
        tableLineWidth: 0,
        margin: { horizontal: 30 },
        styles: { overflow: 'linebreak' },
        headerStyles: { fillColor: '#30aa4c', },
        columnStyles: {
            //     0: { columnWidth: 80 },
            //     1: { columnWidth: 377 },
            // },
            theme: "grid"
        }
    });
    doc.text(30, doc.autoTableEndPosY() + 20, 'Supervisor signature: ' + $("#sup_sig_pdf").val());


    window.open(doc.output('bloburl'));

}
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
    var url_variable;

    $("#tbody_pesticide tr").each(function () {
        if ($("input[name='id_pest_app']").val() != '') {
            url_variable = "update/pest_app";
            console.log("update");
        }
        else {
            url_variable = "insert/pest_app";
            console.log("Insert");
        }
        var id_pest_app = $(this).find("input[name='id_pest_app']").val();
        var spsig_pestapp = $('#spsig_pestapp').val();

        var inf_far = $(this).find(".inf_far").val();
        var date_pestapp = $(this).find(".date_pestapp").val();
        // var crop_pestapp = get_id_crop($(this).find(".crop_pestapp").val(), 'crop_pestapp_list');
        var crop_pestapp = $(this).find(".crop_pestapp").val();
        var plsi_pestapp = $(this).find(".plsi_pestapp").val();
        var targ_pestapp = $(this).find(".targ_pestapp").val();
        var pest_pestapp = $(this).find(".pest_pestapp").val();
        var rate_pestapp = $(this).find(".rate_pestapp").val();
        var amt_pestapp = $(this).find(".amt_pestapp").val();
        var com_pestapp = $(this).find(".com_pestapp").val();
        $.ajax({
            url: url_variable,
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'id_pest_app': id_pest_app,
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
            pestapp_table.ajax.reload();
            setTimeout(function () {
                fillEmptyInputDataPESTAPP();
                get_between_datepestapp();
                hide_spin("btn_pestapp", "spin_pestapp", "not_spin_pestapp");
                $('#alert_pestapp').html("The register has been saved succesfully");
                $('#alert_pestapp').removeClass('d-none');
            }, 1000);
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
// Edit PestApp
function to_edit_pestapp(sup) {
    $("#pesta_frs").collapse("toggle");
    $("input[name='spsig_pestapp']").val(sup);
    $("#tbody_pesticide").empty();
    for (const key in table_pestapp_toedit) {
        if (Object.hasOwnProperty.call(table_pestapp_toedit, key)) {
            const element = table_pestapp_toedit[key];
            $("#tbody_pesticide").append(`<tr>
            <input type="hidden" name="id_pest_app" value="${element['id_pest_app']}">
                                <td><textarea style="overflow:hidden" name="inf_far" placeholder="" class="form-control inf_far" rows="1">${element['inf_far']}</textarea></td>
                                <td><input type="date" name="date_pestapp" placeholder="" class="form-control date_pestapp" style="width: 100px;" value="${element['date_pestapp']}"></td>
                                <td><input list="crop_pestapp_list" name="crop_pestapp" placeholder="" class="form-control crop_pestapp" value="${element['crop_pestapp']}"></td>
                                <td><input type="text" name="plsi_pestapp" placeholder="" class="form-control plsi_pestapp" value="${element['plsi_pestapp']}"></td>
                                <td><input type="text" name="targ_pestapp" placeholder="" class="form-control targ_pestapp" value="${element['targ_pestapp']}"></td>
                                <td><input type="text" name="pest_pestapp" placeholder="" class="form-control pest_pestapp" value="${element['pest_pestapp']}"></td>
                                <td><input type="text" name="rate_pestapp" placeholder="" class="form-control rate_pestapp" value="${element['rate_pestapp']}"> </td>
                                <td><input type="text" name="amt_pestapp" placeholder="" class="form-control amt_pestapp" value="${element['amt_pestapp']}"></td>
                                <td><textarea style="overflow:hidden" name="com_pestapp" placeholder="" class="form-control com_pestapp" rows="1">${element['com_pestapp']}</textarea></td>
                                <td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>
                                </tr>`)

        }
    }

    $('#tbody_pesticide').append('<datalist id="crop_pestapp_list"></datalist>');
    get_cropPestapp();

}
// //////////