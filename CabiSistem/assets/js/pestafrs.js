var pestapp_table;
$(document).ready(function () {
    setinterval(function () {
        pestapp_table.ajax.reload();
    }, 300000);
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

                text: 'PDF',
                titleAttr: "To PDF",
                action: function () {
                    // var farmer = pestapp.row({ selected: true }).data();
                    // get_papp_tb1(farmer.id_plant_apply);
                    to_pdf_pestappform();

                }
            },
            'excel', 'print'
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
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    // console.log(element);
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