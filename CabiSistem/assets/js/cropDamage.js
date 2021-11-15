var cropDamage_table;
// Filled Empty Input Data

function fillEmptyInputDataCRD() {
    $(".crop_damage_form input[type='date']").val('');
    $(".crop_damage_form input[type='text']").val('');
    $(".crop_damage_form input[type='hidden']").val('');
    $("#tbody_crop_damage").empty();
    $("#tbody_crop_damage").append(`
      <tr>
         <td><input type="text" name="farmer_name_crd" placeholder="" class="form-control farmer_name_crd"></td>
         <td><input type="date" name="visit_date_crd" placeholder="" class="form-control visit_date_crd"></td>
          <td><input type="text" name="farmer_reg_crd" placeholder="" class="form-control farmer_reg_crd"></td>
          <td><input type="text" name="contact_crd" placeholder="" class="form-control contact_crd"></td>
          <td><input type="text" name="crop_var_crd" placeholder="" class="form-control crop_var_crd"></td>
          <td><input type="text" name="location_crd" placeholder="" class="form-control location_crd"></td>
          <td><input type="number" name="tot_acre_crd" placeholder="" class="form-control tot_acre_crd"></td>
          <td><input type="text" name="desc_dmg_crd" placeholder="" class="form-control desc_dmg_crd"></td>
          <td><input type="number" name="area_plot_crd" placeholder="" class="form-control area_plot_crd"></td>
          <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
    `);
    $("#tbody_stools").empty();
    $("#tbody_stools").append(`
      <tr>
     <td><input type="number" name="num_stools" placeholder="" class="form-control num_stools"></td>
      <td><input type="number" name="amount" placeholder="" class="form-control amount"></td>
      <td><input type="number" name="age_plants" placeholder="" class="form-control age_plants"></td>
      <td><input type="text" name="stage_mat" placeholder="" class="form-control stage_mat"></td>
       <td><input type="number" name="cost_plant" placeholder="" class="form-control cost_plant"></td>
       <td><input type="number" name="tot_val" placeholder="" class="form-control tot_val"></td>
      <td><input type="text" name="ofc_collec" placeholder="" class="form-control ofc_collec"></td>
       <td><input type="text" name="cert_by" placeholder="" class="form-control cert_by"></td>
       <td><input type="text" name="remark_stools" placeholder="" class="form-control remark"></td>
         <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
 </tr>
    `);


}
// ////////////////////
$(document).ready(function () {
    setInterval(function () {
        cropDamage_table.ajax.reload();
    }, 180000);

    cropDamage_table = $('#crdd_table_report').DataTable({
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
                titleAttr: "Individual form print",
                action: function () {
                    var crop = cropDamage_table.row({ selected: true }).data();

                    to_pdf_cropdamage(crop);

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
            url: "get/crop_damage",
            dataSrc: ""

        },
        columns: [

            { data: 'cdf_ext_dist' },
            { data: 'cdf_date_dis' },
            { data: 'cdf_typ_dis' },
        ],

    });

});
$(document).on("click", "#tbody_crdd_report tr", function () {
    var crop = cropDamage_table.row({ selected: true }).data();

    get_crop_damage_tb1(crop["id_crop_damage"]);
    get_crop_damage_tb2(crop["id_crop_damage"]);
})
function get_crop_damage_tb1(id_crop_damage) {
    $('#tb_crop_damage1').empty();
    $.ajax({
        url: "get/crop_damage_tb1",
        type: "POST",
        data: {
            "id_crop_damage": id_crop_damage,
        },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (respuesta) {
            // var r = JSON.parse(respuesta);
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    // console.log(element);
                    $('#tb_crop_damage1').append("<tr>" +
                        "<td>" + element['farmer_name_crd'] + "</td>" +
                        "<td>" + element['visit_date_crd'] + "</td>" +
                        "<td>" + element['farmer_reg_crd'] + "</td>" +
                        "<td>" + element['contact_crd'] + "</td>" +
                        "<td>" + element['crop_var_crd'] + "</td>" +
                        "<td>" + element['location_crd'] + "</td>" +
                        "<td>" + element['tot_acre_crd'] + "</td>" +
                        "<td>" + element['desc_dmg_crd'] + "</td>" +
                        "<td>" + element['area_plot_crd'] + "</td>" +
                        "</tr>");

                }

            }
        }

    })

}
function get_crop_damage_tb2(id_crop_damage) {
    $('#tb_crop_damage2').empty();
    $.ajax({
        url: "get/crop_damage_tb2",
        type: "POST",
        data: {
            "id_crop_damage": id_crop_damage,
        },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (respuesta) {
            // var r = JSON.parse(respuesta);
            for (const key in respuesta) {
                if (Object.hasOwnProperty.call(respuesta, key)) {
                    const element = respuesta[key];
                    // console.log(element);
                    $('#tb_crop_damage2').append("<tr>" +
                        "<td>" + element['num_stools'] + "</td>" +
                        "<td>" + element['amount'] + "</td>" +
                        "<td>" + element['age_plants'] + "</td>" +
                        "<td>" + element['stage_mat'] + "</td>" +
                        "<td>" + element['cost_plant'] + "</td>" +
                        "<td>" + element['tot_val'] + "</td>" +
                        "<td>" + element['ofc_collec'] + "</td>" +
                        "<td>" + element['cert_by'] + "</td>" +
                        "<td>" + element['remark_stools'] + "</td>" +
                        "</tr>");

                }

            }
        }

    })

}

function to_pdf_cropdamage(crop) {
    let doc = new jsPDF('l', "pt", 'letter');
    doc.setFont('helvetica');
    doc.setFontSize(12);
    // NORMAL FONT TYPE
    doc.setFontType('normal');
    doc.text(300, 30, 'MINISTRY OF AGRICULTURE');
    doc.text(320, 55, 'EXTENSION DIVISION');
    // BOLD FONT TYPE
    doc.setFontType('bold');
    doc.text(320, 80, 'CROP DAMAGE DATA');
    doc.setFontSize(11);
    doc.text(100, 120, "EXTENSION DISTRICT: " + crop['cdf_ext_dist'] + "    DATE OF DISASTER: " + crop['cdf_date_dis'] + "    TYPE OF DISASTER: " + crop['cdf_typ_dis']);

    var tb1 = doc.autoTableHtmlToJson(document.getElementById("t-crop_damage1"));
    var currentpage = 0;
    var footer = function (data) {
        if (currentpage < doc.internal.getNumberOfPages()) {
            doc.setFontSize(10);
            doc.setFontStyle('normal');
            doc.text("Copyright (c) XYZ. All rights reserved.", data.settings.margin.left, doc.internal.pageSize.height - 3);
            currentpage = doc.internal.getNumberOfPages();
        }
    };


    doc.autoTable(tb1.columns, tb1.data, {
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

            // 10: { columnWidth: 39 },

            text: { columnWidth: 'auto' },
            nil: { halign: 'right' },
            tgl: { halign: 'right' }
        },
        theme: 'grid',
        // tableWidth: 'auto',
    });
    doc.rect(10, doc.autoTableEndPosY() + 10, 772, 20, "S");
    doc.setFillColor(48, 170, 76);
    doc.rect(314, doc.autoTableEndPosY() + 10, 230, 20, "F");
    doc.setFontSize("10");
    doc.setTextColor(255, 255, 255);
    doc.text(330, doc.autoTableEndPosY() + 22, "This Section for Head Office  use only");
    var tb2 = doc.autoTableHtmlToJson(document.getElementById("t-crop_damage2"));
    doc.autoTable(tb2.columns, tb2.data, {
        startY: doc.autoTableEndPosY() + 30,
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

            // 0: { fillColor: '#30aa4c' },

            text: { columnWidth: 'auto' },
            nil: { halign: 'right' },
            tgl: { halign: 'right' }
        },
        theme: 'grid',

    });



    window.open(doc.output('bloburl'));
}






// CROP DAMAGE FORM
function add_cropdmg() {

    $('#tbody_crop_damage').append('<tr>' +
        '<td><input type="text" name="farmer_name_crd" placeholder="" class="form-control farmer_name_crd"></td>' +
        '<td><input type="date" name="visit_date_crd" placeholder="" class="form-control visit_date_crd"></td>' +
        '<td><input type="text" name="farmer_reg_crd" placeholder="" class="form-control farmer_reg_crd"></td>' +
        '<td><input type="text" name="contact_crd" placeholder="" class="form-control contact_crd"></td>' +
        '<td><input type="text" name="crop_var_crd" placeholder="" class="form-control crop_var_crd"></td>' +
        '<td><input type="text" name="location_crd" placeholder="" class="form-control location_crd"></td>' +
        '<td><input type="number" name="tot_acre_crd" placeholder="" class="form-control tot_acre_crd"></td>' +
        '<td><input type="text" name="desc_dmg_crd" placeholder="" class="form-control desc_dmg_crd"></td>' +
        '<td><input type="number" name="area_plot_crd" placeholder="" class="form-control area_plot_crd"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
function add_stools() {

    $('#tbody_stools').append('<tr>' +
        '<td><input type="number" name="num_stools" placeholder="" class="form-control num_stools"></td>' +
        '<td><input type="number" name="amount" placeholder="" class="form-control amount"></td>' +
        '<td><input type="number" name="age_plants" placeholder="" class="form-control age_plants"></td>' +
        '<td><input type="text" name="stage_mat" placeholder="" class="form-control stage_mat"></td>' +
        '<td><input type="number" name="cost_plant" placeholder="" class="form-control cost_plant"></td>' +
        '<td><input type="number" name="tot_val" placeholder="" class="form-control tot_val"></td>' +
        '<td><input type="text" name="ofc_collec" placeholder="" class="form-control ofc_collec"></td>' +
        '<td><input type="text" name="cert_by" placeholder="" class="form-control cert_by"></td>' +
        '<td><input type="text" name="remark_stools" placeholder="" class="form-control remark"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
$("#submit_crop_damage").on("click", function () {
    // $("form").submit(function () {
    var ext = $("#cdf_ext_dist").val();
    var date_dis = $("#cdf_date_dis").val();
    var typ_dis = $("#cdf_typ_dis").val();
    show_spin("submit_crop_damage", "spin_crop_dmg", "not_spin_cdmg");
    // console.log(ext, date_dis, typ_dis);
    $.ajax({
        url: "insert/crop_damage",
        type: "POST",
        data: {
            "cdf_ext_dist": ext,
            "cdf_date_dis": date_dis,
            "cdf_typ_dis": typ_dis,
        },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (respuesta) {
            var r = JSON.parse(respuesta);
            setTimeout(function () {
                insert_crop_damage_tb1(r);

            }, 1000);
            setTimeout(function () {
                insert_crop_damage_tb2(r);

            }, 1000);


        }
    }).done(function () {
        cropDamage_table.ajax.reload();
        fillEmptyInputDataCRD();
        hide_spin("submit_crop_damage", "spin_crop_dmg", "not_spin_cdmg");
        $('#alert_crop_dmg').html("The Crop Damage Form Has Been Registred Succesfully");
        $('#alert_crop_dmg').removeClass('d-none');
    })


})
function insert_crop_damage_tb1(id_crop_damage) {
    $("#tbody_crop_damage tr").each(function () {
        var farmer_name_crd = $(this).find(".farmer_name_crd").val();
        var visit_date_crd = $(this).find(".visit_date_crd").val();
        var farmer_reg_crd = $(this).find(".farmer_reg_crd").val();
        var contact_crd = $(this).find(".contact_crd").val();
        var crop_var_crd = $(this).find(".crop_var_crd").val();
        var location_crd = $(this).find(".location_crd").val();
        var tot_acre_crd = $(this).find(".tot_acre_crd").val();
        var desc_dmg_crd = $(this).find(".desc_dmg_crd").val();
        var area_plot_crd = $(this).find(".area_plot_crd").val();
        $.ajax({
            url: "insert/crop_damage_tb1",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'farmer_name_crd': farmer_name_crd,
                'visit_date_crd': visit_date_crd,
                'farmer_reg_crd': farmer_reg_crd,
                'contact_crd': contact_crd,
                'crop_var_crd': crop_var_crd,
                'location_crd': location_crd,
                'tot_acre_crd': tot_acre_crd,
                'desc_dmg_crd': desc_dmg_crd,
                'area_plot_crd': area_plot_crd,
                'id_crop_damage': id_crop_damage
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });

    });
}
function insert_crop_damage_tb2(id_crop_damage) {
    $("#tbody_stools tr").each(function () {
        var num_stools = $(this).find(".num_stools").val();
        var amount = $(this).find(".amount").val();
        var age_plants = $(this).find(".age_plants").val();
        var stage_mat = $(this).find(".stage_mat").val();
        var cost_plant = $(this).find(".cost_plant").val();
        var tot_val = $(this).find(".tot_val").val();
        var ofc_collec = $(this).find(".ofc_collec").val();
        var cert_by = $(this).find(".cert_by").val();
        var remark_stools = $(this).find(".remark_stools").val();
        $.ajax({
            url: "insert/crop_damage_tb2",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'num_stools': num_stools,
                'amount': amount,
                'age_plants': age_plants,
                'stage_mat': stage_mat,
                'cost_plant': cost_plant,
                'tot_val': tot_val,
                'ofc_collec': ofc_collec,
                'cert_by': cert_by,
                'remark_stools': remark_stools,
                'id_crop_damage': id_crop_damage
            },
            success: function (respuesta) {

                console.log(respuesta);
                // var r = JSON.parse(respuesta);
                // console.log(r);


            }
        });

    });
}
// //////////////////////////////////////////////