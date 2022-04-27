var froad_table;
// Filled Empty Input Data

function fillEmptyInputData() {
    $(".farm_roads input[type='date']").val('');
    $(".farm_roads input[type='hidden']").val('');
    $("#tbody_farm_road").empty();
    $("#tbody_farm_road").append(`
      <tr>
        <td><input type="text" name="road_dist" placeholder="" class="form-control road_dist" required></td>
        <td><input type="text" name="road_name" placeholder="" class="form-control road_name" required></td>
        <td><input type="text" name="road_length" placeholder="" class="form-control road_length" required></td>
        <td><input type="number" name="num_farm" placeholder="" class="form-control num_farm" required></td>
        <td><input type="text" name="agr_act" placeholder="" class="form-control agr_act" required></td>
        <td><input type="text" name="work" placeholder="" class="form-control work" required></td>
        <td><input type="text" name="remark" placeholder="" class="form-control remark" required></td>
        <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     </tr>    
    `)


}
// ////////////////////

$(document).ready(function () {
    setInterval(function () {
        froad_table.ajax.reload();
    }, 180000);
    get_farmRoad_toreport($("#date_farm_road").val())
    froad_table = $('#froad_table_report').DataTable({
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
                    var farmer = froad_table.row({ selected: true }).data();
                    to_pdf_farmroad(farmer);
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
                    var dca = froad_table.row({ selected: true }).data();
                    if (dca == null) {
                        alert("Please select a row to Edit");
                    }
                    else {
                        edit_row_froad(dca);
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
            url: "get/farmRoad",
            dataSrc: ""

        },
        columns: [

            { data: 'date_farm_road' },
            { data: 'road_dist' },
            { data: 'road_name' },
            { data: 'road_length' },
            { data: 'num_farm' },
            { data: 'agr_act' },
            { data: 'work' },
            { data: 'remark' },

        ],

    });
})

$("#date_farmroad_report").on("change", function () {
    get_farmRoad_toreport($(this).val());
})
function to_pdf_farmroad() {
    let doc = new jsPDF('l', 'pt', 'a4');
    doc.setFont('helvetica');
    doc.setFontType('normal');
    doc.text(300, 30, 'MINISTRY OF AGRICULTURE');
    doc.text(320, 55, 'EXTENSION DIVISION');
    doc.setFontType('bold');
    doc.text(240, 80, 'List of Farm Roads That Need Urgent Attention');

    // let header = ['Extension District/Parish', 'Name of Road', 'Approximate Length', 'N° of Farmer Using Road', 'Agricultural Activities', 'Work to be Done', 'Remarks'];
    // let width = get_length(header) * 2;
    // // console.log(width);
    // let headerConfig = header.map(key => ({
    //     'name': key,
    //     'prompt': key,
    //     'width': width,
    //     'height': 10,
    //     'align': 'center',
    //     'padding': 0
    // }));

    // doc.table(18, 175, rows, headerConfig);
    var res = doc.autoTableHtmlToJson(document.getElementById("t-farm-road"));
    doc.autoTable(res.columns, res.data, {
        margin: { top: 100 },
        styles: { overflow: 'linebreak', theme: "grid" },
        headerStyles: { fillColor: '#30aa4c', },
    });
    window.open(doc.output('bloburl'));
}
function get_farmRoad_toreport(date_farm_road) {
    $('#tb_farm_road').empty();

    $.ajax({
        method: "POST",
        url: "get/farm_road_report",
        data: { "date_farm_road": date_farm_road },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (result) {

            for (const key in result) {
                if (Object.hasOwnProperty.call(result, key)) {
                    const element = result[key];

                    $('#tb_farm_road').append("<tr>" +
                        "<td>" + element['date_farm_road'] + "</td>" +
                        "<td>" + element['road_dist'] + "</td>" +
                        "<td>" + element['road_name'] + "</td>" +
                        "<td>" + element['road_length'] + "</td>" +
                        "<td>" + element['num_farm'] + "</td>" +
                        "<td>" + element['agr_act'] + "</td>" +
                        "<td>" + element['work'] + "</td>" +
                        "<td>" + element['remark'] + "</td>" +
                        "</tr>")

                }
            }





        }
    });



}
// FARMROAD FORM
function add_road() {
    console.log("estoy aqui y hago esto 2");
    $('#tbody_farm_road').append('<tr>' +
        '<td><input type="text" name="road_dist" placeholder="" class="form-control road_dist"></td>' +
        '<td><input type="text" name="road_name" placeholder="" class="form-control road_name"></td>' +
        '<td><input type="text" name="road_length" placeholder="" class="form-control road_length"></td>' +
        '<td><input type="number" name="num_farm" placeholder="" class="form-control num_farm"></td>' +
        '<td><input type="text" name="agr_act" placeholder="" class="form-control agr_act"></td>' +
        '<td><input type="text" name="work" placeholder="" class="form-control work"></td>' +
        '<td><input type="text" name="remark" placeholder="" class="form-control remark"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
$("#submit_farm_road").on("click", function () {
    show_spin("submit_farm_road", "spin_farm_road", "not_spin_farm_road");

    var date_farm_road = $("#date_farm_road").val();
    $("#tbody_farm_road tr").each(function () {
        var url_variable;
        var road_dist = $(this).find(".road_dist").val();
        var road_name = $(this).find(".road_name").val();
        var road_length = $(this).find(".road_length").val();
        var num_farm = $(this).find(".num_farm").val();
        var agr_act = $(this).find(".agr_act").val();
        var work = $(this).find(".work").val();
        var remark = $(this).find(".remark").val();
        var id_farm_road = $("input[name='id_farm_road']").val();
        if ($("input[name='id_farm_road']").val() != '') {
            url_variable = "update/farmRoad";
        }
        else {
            url_variable = "insert/farmRoad";
        }
        console.log(url_variable);

        $.ajax({
            url: url_variable,
            type: "POST",
            data: {
                'id_farm_road': id_farm_road,
                'date_farm_road': date_farm_road,
                'road_dist': road_dist,
                'road_name': road_name,
                'road_length': road_length,
                'num_farm': num_farm,
                'agr_act': agr_act,
                'work': work,
                'remark': remark
            },
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            success: function (respuesta) {

                var r = JSON.parse(respuesta);



            }
        });
    })
    froad_table.ajax.reload();


    setTimeout(function () {
        fillEmptyInputData();

        hide_spin("submit_farm_road", "spin_farm_road", "not_spin_farm_road");
        $('#alert_farm_roads').html("The register has been saved succesfully");
        $('#alert_farm_roads').removeClass('d-none');

    }, 1000);


})

// ////////////////////////////////////////////////////////////////
function edit_row_froad(data) {
    $("#farm_roads").collapse("toggle");
    $("input[name='id_farm_road']").val(data['id_farm_roads'])
    $("#date_farm_road").val(data['date_farm_road']);
    $("#tbody_farm_road tr").each(function () {
        $("input[name='road_dist']").val(data['road_dist']);
        $("input[name='road_name']").val(data['road_name']);
        $("input[name='road_length']").val(data['road_length']);
        $("input[name='num_farm']").val(data['num_farm']);
        $("input[name='agr_act']").val(data['agr_act']);
        $("input[name='work']").val(data['work']);
        $("input[name='remark']").val(data['remark']);
    })
}