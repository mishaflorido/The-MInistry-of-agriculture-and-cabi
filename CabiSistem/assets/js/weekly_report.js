var ofwr_table;

$(".frm_ofwr").keypress(function (e) {
    if (e.keyCode == 13 && !e.shiftKey) {
        e.preventDefault();
    }
})

$(document).ready(function () {
    setInterval(function () {
        ofwr_table.ajax.reload();
        console.log("reload")
    }, 180000);
    ofwr_table = $('#ofwr_table_report').DataTable({
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
                    var ofwr = ofwr_table.row({ selected: true }).data();
                    if (ofwr == null) {
                        alert('Please select a row to create PDF')
                    } else {
                        to_pdf_ofwr(ofwr);
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
            url: "get/oficer_wr",
            dataSrc: ""

        },
        columns: [

            { data: 'ofc_name' },
            { data: 'ofc_desig' },
            { data: 'ofc_week' },
            { data: 'ofc_dpt' },
            { data: 'wk_beg' },


        ],

    });
});
$(document).on("click", "#tbody_ofwr_report tr", function () {
    var weekend = ofwr_table.row({ selected: true }).data();
    get_end_week(weekend['id_of_wr']);
    get_other_activities(weekend['id_of_wr']);
    get_week_beginning(weekend['id_of_wr']);

});
function get_end_week(id_of_wr) {
    $("#tb_wr").empty();
    $.ajax({
        url: "get/endWeek",
        type: "POST",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        data: {
            'id_of_wr': id_of_wr,

        },
        success: function (respuesta) {
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    // var day = new Date(element['date_rpt_day']);


                    $('#tb_wr').append("<tr>" +
                        "<td>" + element['day_ofwr'] + " - " + element['date_rpt_day'] + "</td>" +
                        "<td>" + element['name_wkly_rpt'] + "</td>" +
                        "<td>" + element['date_wkly_rpt'] + "</td>" +
                        "<td>" + element['clt_wkly_rpt'] + "</td>" +
                        "<td>" + element['Adv_wkly_rpt'] + "</td>" +
                        "<td>" + element['time_wkly_rpt'] + "</td>" +
                        "<td>" + element['miles_wkly_rpt'] + "</td>" +
                        "</tr>");

                }

            }
        }
    })
}
function get_other_activities(id_of_wr) {
    $("#tb_oa").empty();
    $.ajax({
        url: "get/otherActivities",
        type: "POST",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        data: {
            'id_of_wr': id_of_wr,

        },
        success: function (respuesta) {
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    // var day = new Date(element['date_rpt_day']);


                    $('#tb_oa').append("<tr>" +
                        "<td>" + element['date_other_act'] + "</td>" +
                        "<td>" + element['nat_act'] + "</td>" +
                        "<td>" + element['det_act'] + "</td>" +
                        "</tr>");

                }

            }
        }
    })
}
function get_week_beginning(id_of_wr) {
    $("#tb_wb").empty();
    $.ajax({
        url: "get/weekBeginning",
        type: "POST",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        data: {
            'id_of_wr': id_of_wr,

        },
        success: function (respuesta) {
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    // var day = new Date(element['date_rpt_day']);


                    $('#tb_wb').append("<tr>" +
                        "<td>" + element['day_plan_rpt'] + " - " + element['date_plan_rpt'] + "</td>" +
                        "<td>" + element['prp_act'] + "</td>" +
                        "<td>" + element['name_act'] + "</td>" +
                        "<td>" + element['loc_prp'] + "</td>" +
                        "<td>" + element['nat_prp'] + "</td>" +
                        "</tr>");

                }

            }
        }
    })
}
function to_pdf_ofwr(data) {
    let doc = new jsPDF('l', 'pt', 'letter');
    doc.setFont('helvetica');
    doc.setFontType('normal');

    // Header to print variables

    doc.setFontType('bold');
    doc.setFontSize(20)
    doc.text(260, 30, 'MINISTRY OF AGRICULTURE');
    doc.setFontType('normal');
    doc.text(260, 55, 'OFICCERS WEEKLY REPORT');
    doc.setFontSize(14)
    doc.text(240, 80, '(To be submited to Officcer-in-charge on Mondays)');
    doc.setFontSize(12)
    doc.text(70, 125, 'Name of Officcer: ' + data['ofc_name']);
    doc.text(470, 125, 'Designation: ' + data['ofc_desig']);
    doc.text(70, 160, 'Week ending: ' + data['ofc_week']);
    doc.text(470, 160, 'Departament/Unit: ' + data['ofc_dpt']);
    var res = doc.autoTableHtmlToJson(document.getElementById("table_wr"));
    doc.autoTable(res.columns, res.data, {
        startY: 180,
        tableLineColor: 200,
        tableLineWidth: 0,
        margin: { horizontal: 30 },
        styles: { overflow: 'linebreak' },
        headerStyles: { fillColor: '#30aa4c', },
        columnStyles: {
            5: { columnWidth: 40 },
            6: { columnWidth: 40 },
            // },
            theme: "grid"
        }
    });
    doc.addPage("letter", "l");
    doc.setFontType('bold');
    doc.setFontSize(20)
    doc.text("Other Official Activities", 280, 30);
    doc.setFontType('normal');
    doc.setFontSize(14)
    doc.text("(Attendance at meetings, seminars, demostrations, etc.)", 220, 55);
    var res = doc.autoTableHtmlToJson(document.getElementById("table_oa"));
    doc.autoTable(res.columns, res.data, {
        startY: 80,
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
    doc.setFontType("bold");
    doc.setFontSize(20);
    doc.text("ITINERARY FOR NEXT WEEK", 260, doc.autoTableEndPosY() + 30);
    doc.setFontType("normal");
    doc.setFontSize(12);
    doc.text("Week beginning: " + data['wk_beg'], 90, doc.autoTableEndPosY() + 70);
    doc.text("Name of Officer: " + data['ofc_name'], 490, doc.autoTableEndPosY() + 70);
    var res = doc.autoTableHtmlToJson(document.getElementById("table_wb"));
    doc.autoTable(res.columns, res.data, {
        startY: doc.autoTableEndPosY() + 100,
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



    window.open(doc.output('bloburl'));
}


// OFFICER WEEKLY REPORT FORM
$(document).on("change", "#week_end", function () {
    var date_n = new Date($(this).val());
    var x_date = new Date($(this).val());

    var start_date = date_n.getDate();
    // console.log(start_date);

    $("#tbody_wkly_past_report tr").each(function () {
        x_date.setDate(x_date.getDate() + 1);
        // x_date.setUTCDate(start_date + 1);
        $(this).children().find(".h_input").val(x_date.toLocaleDateString());

        // start_date += 1;

    })



})
$(document).on("change", "#week_beg", function () {
    var date_n = new Date($(this).val());
    var x_date = new Date($(this).val());

    var start_date = date_n.getDate();


    $("#tbody_wkly_plan_report tr").each(function () {
        x_date.setDate(x_date.getDate() + 1);
        // console.log($(this).children().html());
        $(this).children().find(".h_input_b").val(x_date.toLocaleDateString());

        // start_date += 1;

    })
})
function add_other_act() {

    $('#tbody_other_ofActivities').append('<tr>' +
        '<td><input type="text" name="date_other_act" placeholder="Day, date & time" class="form-control date_other_act"></td>' +
        '<td><input type="text" name="nat_act" placeholder="Nature of activity" class="form-control nat_act"></td>' +
        '<td><input type="text" name="det_act" placeholder="Details" class="form-control det_act"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
$("form").submit(function (event) {

    if ($(this).attr('class') == 'frm_ofwr') {
        event.preventDefault();
        show_spin("ofiwr_btn_submit", "spin_ofwr", "not_spin_ofwr");

        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "insert/oficer_wr",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {


                var r = JSON.parse(respuesta);
                setTimeout(function () {
                    insert_week_report(r);
                }, 1000);
                setTimeout(function () {
                    insert_other_activ(r);

                }, 1000);
                setTimeout(function () {
                    insert_itinerary_week(r);

                }, 1000);
                // setTimeout(function () {
                //     future_development(r);

                // }, 1000);


            }
        }).done(function () {
            fillEmptyInputDataWR();
            ofwr_table.ajax.reload();
            hide_spin("ofiwr_btn_submit", "spin_ofwr", "not_spin_ofwr");
            $('#alert_ofwr').html("The Oficers Itinerary Has Been Registred Succesfully");
            $('#alert_ofwr').removeClass('d-none');
        });
    }

})
function insert_itinerary_week(id_of_wr) {
    $("#tbody_wkly_plan_report tr").each(function () {
        var date_plan_rpt = $(this).find(".date_plan_rpt").val();
        var day_plan_rpt = $(this).find(".day_plan_rpt").val();
        var prp_act = $(this).find(".prp_act").val();
        var name_act = $(this).find(".name_act").val();
        var loc_prp = $(this).find(".loc_prp").val();
        var nat_prp = $(this).find(".nat_prp").val();

        $.ajax({
            url: "insert/itinerary_week",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'date_plan_rpt': date_plan_rpt,
                'day_plan_rpt': day_plan_rpt,
                'prp_act': prp_act,
                'name_act': name_act,
                'loc_prp': loc_prp,
                'nat_prp': nat_prp,
                'id_of_wr': id_of_wr

            },
            success: function (respuesta) {

                console.log(respuesta);



            }
        });

    });

}
function insert_other_activ(id_of_wr) {
    $("#tbody_other_ofActivities tr").each(function () {
        var date_other_act = $(this).find(".date_other_act").val();
        var nat_act = $(this).find(".nat_act").val();
        var det_act = $(this).find(".det_act").val();
        $.ajax({
            url: "insert/other_activ",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'date_other_act': date_other_act,
                'nat_act': nat_act,
                'det_act': det_act,
                'id_of_wr': id_of_wr
            },
            success: function (respuesta) {

                console.log(respuesta);



            }
        });

    })
}
function insert_week_report(id_of_wr) {
    $("#tbody_wkly_past_report tr").each(function () {
        var date_rpt_day = $(this).find(".date_rpt_day").val();
        var day_ofwr = $(this).find(".day_ofwr").val();
        var name_wkly_rpt = $(this).find(".name_wkly_rpt").val();
        var date_wkly_rpt = $(this).find(".date_wkly_rpt").val();
        var clt_wkly_rpt = $(this).find(".clt_wkly_rpt").val();
        var Adv_wkly_rpt = $(this).find(".Adv_wkly_rpt").val();
        var time_wkly_rpt = $(this).find(".time_wkly_rpt").val();
        var miles_wkly_rpt = $(this).find(".miles_wkly_rpt").val();

        $.ajax({
            url: "insert/weekend_wr",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'date_rpt_day': date_rpt_day,
                'day_ofwr': day_ofwr,
                'name_wkly_rpt': name_wkly_rpt,
                'date_wkly_rpt': date_wkly_rpt,
                'clt_wkly_rpt': clt_wkly_rpt,
                'Adv_wkly_rpt': Adv_wkly_rpt,
                'time_wkly_rpt': time_wkly_rpt,
                'miles_wkly_rpt': miles_wkly_rpt,
                'id_of_wr': id_of_wr

            },
            success: function (respuesta) {

                console.log(respuesta);



            }
        });

    });

}
//  Filled Empty Input Data

function fillEmptyInputDataWR() {
    console.log("empty");
    $(".frm_ofwr input[type='date']").val('');
    $(".frm_ofwr input[type='text']").not('.day_ofwr, .day_plan_rpt').val('');
    $(".frm_ofwr input[type='number']").val('');
    $(".frm_ofwr textarea").val('');



}
// ////////////////////