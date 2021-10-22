let rows = [];
$(document).ready(function () {


    var table = $('#farmer_table_report').DataTable({
        select: {
            style: 'single',
            blurable: true
        },
        stateSave: true,
        dom: 'Bfrtip',
        pagingType: "input",
        buttons: [
            {

                text: '<i class="fas fa-trash-o" aria-hidden="true"></i>',
                titleAttr: "Individual form print",
                action: function () {
                    var farmer = table.row({ selected: true }).data();
                    if (farmer == null) {
                        alert("Please select a row to create PDF");

                    } else {
                        to_pdf_dcaform(farmer);
                    }


                }
            },
            'excel', 'print'
        ],
        ajax: {
            method: "GET",
            url: "get/farmer",
            dataSrc: ""

        },
        columns: [

            { data: 'date_reg' },
            { data: 'name' },
            { data: 'AKA' },
            { data: 'birthdate' },
            { data: 'address' },
            { data: 'phone_num' },
            { data: 'sex' },
            { data: 'name_lv3' },
            { data: 'watershed' },
            { data: 'parcel_num' },
            { data: 'go_market' },
            { data: 'boundary' },
            { data: 'fe_pump' },

        ],
        columnDefs: [
            {
                targets: [1],
                data: 'name',
                render: function (data, type, row) {
                    return "<span></i>" + data + " " + row.last_name + " " + row.mo_last_name + "</span><input class='id_farm' type='hidden' name='id_farm_other' value=" + row.id_farm + ">"


                }

            },
            {
                targets: [2],
                data: 'AKA',
                render: function (data, type, row) {
                    return "<span><i class='fas fa-hashtag'></i>&nbsp;" + data + "</span>"


                }

            },
            {
                targets: [6],
                data: 'sex',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>Female</span>"
                    }
                    if (data == 2) {
                        return "<span>Male</span>"
                    }


                }

            },

            {
                targets: [9],
                data: 'parcel_num',
                render: function (data, type, row) {
                    return "<span><i class='fas fa-hashtag'></i>&nbsp;" + data + "</span>"


                }

            },
            {
                targets: [10],
                data: 'go_market',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>YES</span>"
                    }
                    if (data == 0) {
                        return "<span>NO</span>"
                    }


                }

            },
            {
                targets: [11],
                data: 'boundary',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>KNOW</span>"
                    }
                    if (data == 0) {
                        return "<span>UNKNOW</span>"
                    }


                }

            },
            {
                targets: [12],
                data: 'fe_pump',
                render: function (data, type, row) {
                    var cadena = "<span>";
                    if (data == 1) {
                        cadena += "Pump ";
                    }
                    if (row.fe_irrig_line == 1) {
                        cadena += "Irrigator Line ";
                    }
                    if (row.fe_other == 1) {
                        cadena += "Other ";
                    }
                    cadena += "</span>";
                    return cadena;

                }

            },



            // {
            //     targets: [5],
            //     data: 'phone_num',
            //     render: function (data, type, row) {
            //         if (data == 'Activo') {
            //             return "<span class='badge bg-success'>" + data + "</span>"
            //         } else if (data == 'Inactivo') {
            //             return "<span class='badge bg-danger'>" + data + "</span>"
            //         }
            //     }

            // },
        ]
    });

});
$(document).on("click", "#tbody_farmer_registered tr", function () {
    var id_farm = $(this).find(".id_farm").val();
    // console.log(id_farm);
    get_otherinvolved(id_farm);

})

function to_pdf_farmer(farmer) {
    let doc = new jsPDF('p', 'mm', 'a4');

    doc.setFont('helvetica');
    doc.setFontType('bold');
    doc.text(25, 40, 'THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES');
    doc.setFontType('bold');
    doc.setFontSize(12);
    doc.text(12, 60, 'FARMER REGISTRATION FORM');
    doc.setFontType('normal');
    doc.text(12, 75, 'Date: ');
    doc.text(23, 75, farmer['date_reg']);
    doc.setFontType('bold');
    doc.setFontSize(14);
    doc.text(12, 95, 'CONFIDENTIAL');
    doc.line(12, 96, 47, 96);
    doc.text(12, 105, 'I....PERSONSAL');
    doc.setFontSize(12);
    doc.setFontType('normal');
    doc.text(18, 115, '1. NAME: ' + farmer['name'] + " " + farmer['last_name'] + " " + farmer['mo_last_name']);
    doc.text(110, 115, "AKA: " + farmer['AKA']);
    doc.text(18, 125, '2. DATE OF BIRTH: ' + farmer['birthdate']);
    doc.text(18, 135, '3. HOME ADDRES: ' + farmer['address']);
    doc.text(18, 145, '4. TELEPHONE NUMBER: ' + farmer['phone_num']);
    if (farmer['sex'] == 1) {
        doc.text(18, 155, '5. SEX: Female');
    } else {
        doc.text(18, 155, '5. SEX: Male');
    }
    doc.text(18, 165, '6. NAME(S) OF OTHERS IN HOUSEHOLD/GROUP INVOLVED IN THE FARMING BUSINESS');

    let header = ["Name", "Last Name"];
    let width = get_length(header);

    let headerConfig = header.map(key => ({
        'name': key,
        'prompt': key,
        'width': width,
        'height': 10,
        'align': 'center',
        'padding': 0
    }));

    // doc.table(18, 175, rows, headerConfig);
    var res = doc.autoTableHtmlToJson(document.getElementById("t-other"));
    doc.autoTable(res.columns, res.data, { margin: { top: 180 } });
    // doc.text(18, "Hol como estas");



















    window.open(doc.output('bloburl'));



}
function get_length(arr) {
    var aux = 0;
    arr.forEach(element => {
        // console.log(element.length);
        if (element.length >= aux) {
            aux = element.length;
        }

    });
    return aux + 50;
}
function get_otherinvolved(id_farm) {
    $('#tb_other').empty();
    rows.length = 0;
    $.ajax({
        method: "POST",
        url: "get/otherinvolved",
        data: { "id_farm": id_farm },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (result) {

            for (const key in result) {
                if (Object.hasOwnProperty.call(result, key)) {
                    const element = result[key];
                    var item = {
                        "Name": element['name'],
                        "Last Name": element['last_name']
                    };
                    // console.log(item);
                    rows.push(item);
                    $('#tb_other').append("<tr>" +
                        "<td>" + element['name'] + "</td>" +
                        "<td>" + element['last_name'] + "</td>" +
                        "</tr>")

                }
            }





        }
    });



}