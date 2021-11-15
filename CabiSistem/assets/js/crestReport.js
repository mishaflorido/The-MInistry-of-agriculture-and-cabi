var cropest_table;
var aux_table_cropest;
$(document).ready(function () {

    setInterval(function () {
        cropest_table.ajax.reload();
        // console.log("cropest_tale table loaded");
    }, 180000);


    cropest_table = $('#crest_table_report').DataTable({
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
                    var cropest = cropest_table.row({ selected: true }).data();
                    if (cropest == null) {
                        alert("Please select a row to create PDF");
                    } else {
                        to_pdf_cropest(cropest);
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
                    var dca = cropest_table.row({ selected: true }).data();
                    if (dca == null) {
                        alert("Please select a row to Edit");
                    }
                    else {
                        edit_row_cropest(dca);
                    }

                }
            },
            {
                extend: 'excel',
                text: 'Excel'
            },
        ],
        ajax: {
            method: "GET",
            url: "get/weekly_data_collector",
            dataSrc: ""

        },
        columns: [

            { data: 'registration_number' },
            { data: 'farmer_name' },
            { data: 'parcel_address' },
            { data: 'parcel_number' },

        ],

    });

});
$(document).on("click", "#tbody_crest_report tr", function () {
    var crop = cropest_table.row({ selected: true }).data();
    get_weekly_data_collection(crop["id_praedial"]);
})
function get_weekly_data_collection(id_praedial) {
    $('#tb_cropest').empty();
    $.ajax({
        url: "get/weekly_data",
        type: "POST",
        data: {
            "id_praedial": id_praedial,
        },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (respuesta) {
            aux_table_cropest = respuesta;
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    console.log(element);
                    $('#tb_cropest').append("<tr>" +
                        "<td>" + element['crop_name'] + "</td>" +
                        "<td>" + element['plot_size'] + "</td>" +
                        "<td>" + element['n_stools'] + "</td>" +
                        "<td>" + element['date_planted'] + "</td>" +
                        "<td>" + element['variety'] + "</td>" +
                        "<td>" + element['stage_maturity'] + "</td>" +
                        "<td>" + element['harvest_date'] + "</td>" +
                        "<td>" + element['yield'] + "</td>" +
                        "<td>" + element['activities_carried'] + "</td>" +
                        "<td>" + element['taq_arf_moa'] + "</td>" +
                        "<td>" + element['n_farm_visits'] + "</td>" +
                        "<td>" + element['remarks'] + "</td>" +
                        "</tr>");

                }

            }
        }

    })

}
function to_pdf_cropest(crop) {
    let doc = new jsPDF('l', "pt", 'letter');
    doc.setFont('helvetica');
    // NORMAL FONT TYPE
    doc.setFontType('normal');
    doc.text(300, 30, 'MINISTRY OF AGRICULTURE');
    doc.text(280, 55, 'WEEKLY DATA COLLECTION FORM');
    doc.text(200, 80, 'CROP ESTABLISHMENT AND PRODUCTION INFORMATION');
    // BOLD FONT TYPE
    doc.setFontType('bold');
    doc.setFontSize(11);
    doc.text(12, 120, "Registration Number: " + crop['registration_number'] + "    Farmer Name: " + crop['farmer_name'] + "    Land Parcel Address: " + crop['parcel_address'] + "     Parcel #: " + crop['parcel_number'])
    // console.log($("#t-cropes").html());
    var res = doc.autoTableHtmlToJson(document.getElementById("t-cropest"));
    var currentpage = 0;
    var footer = function (data) {
        if (currentpage < doc.internal.getNumberOfPages()) {
            doc.setFontSize(10);
            doc.setFontStyle('normal');
            doc.text("Copyright (c) XYZ. All rights reserved.", data.settings.margin.left, doc.internal.pageSize.height - 3);
            currentpage = doc.internal.getNumberOfPages();
        }
    };
    doc.autoTable(res.columns, res.data, {
        startY: 145,
        afterPageContent: footer,
        margin: { horizontal: 10 },
        showHeader: 'everyPage',
        tableLineColor: 200,
        tableLineWidth: 0,
        height: 'auto',
        bodyStyles: {
            valign: 'top',
            minCellHeight: 8,
        },
        headerStyles: {
            fillColor: '#30aa4c',
            minCellHeight: 8,
            fontSize: 10,
            cellPadding: 2,
        },
        styles: {
            overflow: 'linebreak',
            fontSize: 10,
            cellPadding: 2,
        },


        columnStyles: {

            10: { columnWidth: 39 },

            text: { columnWidth: 'auto' },
            nil: { halign: 'right' },
            tgl: { halign: 'right' }
        },
        theme: 'grid',
        // tableWidth: 'auto',
    });





    window.open(doc.output('bloburl'));
}
function edit_row_cropest(data) {
    $("#larceny_programme").collapse("toggle");
    $("input[name='id_praedial']").val(data['id_praedial']);
    $("input[name='registration_number']").val(data['registration_number']);
    $("input[name='farmer_name']").val(data['farmer_name']);
    $("input[name='parcel_address']").val(data['parcel_address']);
    $("input[name='parcel_number']").val(data['parcel_number']);
    $("#tbody_produce").empty();
    for (const key in aux_table_cropest) {
        if (Object.hasOwnProperty.call(aux_table_cropest, key)) {
            const element = aux_table_cropest[key];
            $('#tbody_produce').append(`<tr>
            
            <td><input type="hidden" name="id_wdc" class="id_wdc" value="${element['id_wdc']}"><input type="text" name="crop_name" placeholder="" style="width: auto" class="form-control crop_name" value="${element['crop_name']}"></td>
            <td><input type="number" name="plot_size" placeholder="" class="form-control plot_size" value="${element['plot_size']}" ></td>
            <td><input type="number" name="n_stools" style="width: auto" placeholder="" class="form-control n_stools" value="${element['n_stools']}"></td>
            <td><input type="date" name="date_planted" placeholder="" style="width: auto" class="form-control date_planted" value="${element['date_planted']}"></td>
            <td><input type="text" name="variety" placeholder="" class="form-control variety" value="${element['variety']}"></td>
            <td><input type="text" name="stage_maturity" placeholder="" class="form-control stage_maturity" value="${element['stage_maturity']}"></td>
            <td> <input type="date" name="harvest_date" placeholder="" style="width: auto" class="form-control  harvest_date" value="${element['harvest_date']}"></td>
            <td><input type="text" name="yield" placeholder="" class="form-control yield" value="${element['yield']}"></td>
            <td><input type="text" name="activities_carried" placeholder="" class="form-control activities_carried" value="${element['activities_carried']}"></td>
            <td><input type="text" name="taq_arf_moa" placeholder=""style="width: auto" class="form-control taq_arf_moa" value="${element['taq_arf_moa']}"></td>
            <td><input type="number" name="n_farm_visits" placeholder="" class="form-control n_farm_visits" value="${element['n_farm_visits']}"></td>
            <td><input type="text" name="remarks" placeholder="" class="form-control remarks" value="${element['remarks']}"></td>
            <td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>
            </tr>`);

        }
    }
}