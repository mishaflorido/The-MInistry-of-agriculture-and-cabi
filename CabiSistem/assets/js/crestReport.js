var cropest_table;
$(document).ready(function () {

    setInterval(function () {
        cropest_table.ajax.reload();
        // console.log("cropest_tale table loaded");
    }, 300000);


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

                text: 'PDF',
                titleAttr: "To PDF",
                action: function () {
                    var cropest = cropest_table.row({ selected: true }).data();

                    to_pdf_cropest(cropest);

                }
            },
            'excel', 'print'
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
            // var r = JSON.parse(respuesta);
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
