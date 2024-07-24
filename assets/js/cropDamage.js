var cropDamage_table;
var tb_crop_damage1;
var tb_crop_damage2;
var variety;
var Nrows = 1;
// Filled Empty Input Data

function fillEmptyInputDataCRD() {
  $(".crop_damage_form input[type='date']").val("");
  $(".crop_damage_form input[type='text']").val("");
  $(".crop_damage_form input[type='hidden']").val("");
  $("#tbody_crop_damage").empty();
  $("#tbody_crop_damage").append(`
      <tr>
      <input type="hidden" value="" name="id_cd_table1">
         <td><input style="width: 200px;" type="text" name="farmer_name_crd" placeholder="" style="width: 100px" class="form-control farmer_name_crd"></td>
         <td><input style="width: 200px;" type="date" name="visit_date_crd" placeholder="" style="width: 100px" class="form-control visit_date_crd"></td>
          <td><input style="width: 200px;" type="text" name="farmer_reg_crd" placeholder="" style="width: 100px" class="form-control farmer_reg_crd"></td>
          <td><input style="width: 200px;" type="text" name="contact_crd" placeholder="" style="width: 100px" class="form-control contact_crd"></td>
          <td><input list="cropdmg_datalist" name="cropdmg_name" class="form-control cropdmg_name" style="width: 200px;"><datalist id="cropdmg_datalist"></datalist></td>
          <td><input list="varietydmg_datalist1" name="crop_var_crd" class="form-control crop_var_crd" style="width: 200px" id="varietydmg_list1"><datalist id="varietydmg_datalist1"></datalist></td>
          <td><input style="width: 200px;" type="text" name="location_crd" placeholder="" style="width: 100px" class="form-control location_crd"></td>
          <td><input style="width: 200px;" type="number" name="tot_acre_crd" placeholder="" style="width: 100px" class="form-control tot_acre_crd"></td>
          <td><input style="width: 200px;" type="text" name="desc_dmg_crd" placeholder="" style="width: 100px" class="form-control desc_dmg_crd"></td>
          <td><input style="width: 200px;" type="number" name="area_plot_crd" placeholder="" style="width: 100px" class="form-control area_plot_crd"></td>
          <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
    `);
  $("#tbody_stools").empty();
  $("#tbody_stools").append(`
      <tr>
      <input type="hidden" value="" name="id_cd_stool">
     <td><input style="width: 200px;" type="number" value="0" name="num_stools" style="width: 100px" placeholder="" class="form-control num_stools"></td>
      <td><input style="width: 200px;" type="number" value="0" name="amount" style="width: 100px" placeholder="" class="form-control amount"></td>
      <td><input style="width: 200px;" type="number" value="0" name="age_plants" style="width: 100px" placeholder="" class="form-control age_plants"></td>
      <td><input style="width: 200px;" type="text" name="stage_mat" placeholder="" style="width: 100px" class="form-control stage_mat"></td>
       <td><input style="width: 200px;" type="number" value="0" name="cost_plant" style="width: 100px" placeholder="" class="form-control cost_plant"></td>
       <td><input style="width: 200px;" type="number" value="0" name="tot_val"  placeholder="" class="form-control tot_val"></td>
      <td><input style="width: 200px;" type="text" name="ofc_collec" placeholder="" style="width: 100px" class="form-control ofc_collec"></td>
       <td><input style="width: 200px;" type="text" name="cert_by" placeholder="" style="width: 100px" class="form-control cert_by"></td>
       <td><input style="width: 200px;" type="text" name="remark_stools" placeholder="" style="width: 100px" class="form-control remark"></td>
         <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
 </tr>
    `);
}
// ////////////////////
$(document).ready(function () {
  getCropCDM();
  getVarietyCDM();
  setInterval(function () {
    cropDamage_table.ajax.reload();
  }, 180000);

  cropDamage_table = $("#crdd_table_report").DataTable({
    select: {
      style: "single",
      blurable: true,
    },
    dom: '<"top"fB>rt<"bottom"lip><"clear">',
    stateSave: true,
    pagingType: "simple_numbers",
    buttons: [
      {
        text: "Individual form print",
        titleAttr: "Individual form print",
        action: function () {
          var crop = cropDamage_table.row({ selected: true }).data();

          to_pdf_cropdamage(crop);
        },
      },
      {
        extend: "print",
        text: "Print Table",
      },
      {
        text: "Edit Row",
        titleAttr: "Edit register",
        action: function () {
          var dca = cropDamage_table.row({ selected: true }).data();
          if (dca == null) {
            alert("Please select a row to Edit");
          } else {
            edit_row_cropdmg(dca);
          }
        },
      },
      {
        extend: "excel",
        text: "Excel",
      },

      {
        text: "Delete Row",
        titleAttr: "Delete Register",
        action: function () {
          var dca = cropDamage_table.row({ selected: true }).data();
          if (dca == null) {
            alert("Please select a row to Delete");
          } else {
            if (confirm("Want to Delete the row?")) {
              delete_row_cropdmg(dca);
            }
          }
        },
      },
    ],
    ajax: {
      method: "GET",
      url: "get/crop_damage",
      dataSrc: "",
    },
    columns: [
      { data: "name_user" },
      { data: "cdf_ext_dist" },
      { data: "cdf_date_dis" },
      { data: "cdf_typ_dis" },
    ],
  });
});
//Get Variery
function getVarietyCDM() {
  $.ajax({
    method: "GET",
    url: "get/variety",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    success: function (result) {
      // console.log(result);
      variety = result;
    },
  });
}
// Get Crop
function getCropCDM() {
  $.ajax({
    method: "GET",
    url: "get/crop",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    success: function (result) {
      // console.log(result);

      for (const key in result) {
        if (result.hasOwnProperty.call(result, key)) {
          const element = result[key];
          $("#cropdmg_datalist").append(
            "<option class='" +
              element["Crop_name"] +
              "' id='" +
              element["id_crop"] +
              "' value='" +
              element["Crop_name"] +
              "'></option>"
          );
        }
      }
    },
  });
}
// Search Variety if Crop Selected Change
$(document).on("change", "input[name=cropdmg_name]", function () {
  // console.log("valor" + $(this).val());
  var id_crop = get_id_crop($(this).val(), "cropdmg_datalist");
  let row = $(this).parents().parents().data("row");
  let datalist = $(this)
    .parents()
    .find("#varietydmg_datalist" + row);
  console.log(row);
  $("#varietydmg_list" + row).val("");
  $("#varietydmg_datalist" + row).empty();
  for (const key in variety) {
    if (Object.hasOwnProperty.call(variety, key)) {
      const element = variety[key];
      if (element["id_crop"] == id_crop) {
        datalist.append(
          "<option class='" +
            element["name_variety"] +
            "' data-id='" +
            element["id_variety"] +
            "' value='" +
            element["name_variety"] +
            "'></option>"
        );
      }
    }
  }
});
$(document).on("click", "#tbody_crdd_report tr", function () {
  var crop = cropDamage_table.row({ selected: true }).data();

  get_crop_damage_tb1(crop["id_crop_damage"]);
  get_crop_damage_tb2(crop["id_crop_damage"]);
});
function get_crop_damage_tb1(id_crop_damage) {
  $("#tb_crop_damage1").empty();
  $.ajax({
    url: "get/crop_damage_tb1",
    type: "POST",
    data: {
      id_crop_damage: id_crop_damage,
    },
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    success: function (respuesta) {
      tb_crop_damage1 = respuesta;
      // var r = JSON.parse(respuesta);
      for (const key in respuesta) {
        if (Object.hasOwnProperty.call(respuesta, key)) {
          const element = respuesta[key];
          // console.log(element);
          $("#tb_crop_damage1").append(
            "<tr>" +
              "<td>" +
              element["farmer_name_crd"] +
              "</td>" +
              "<td>" +
              element["visit_date_crd"] +
              "</td>" +
              "<td>" +
              element["farmer_reg_crd"] +
              "</td>" +
              "<td>" +
              element["contact_crd"] +
              "</td>" +
              "<td>" +
              element["location_crd"] +
              "</td>" +
              "<td>" +
              element["tot_acre_crd"] +
              "</td>" +
              "<td>" +
              element["crop_var_crd"] +
              " - " +
              element["cropdmg_name"] +
              "</td>" +
              "<td>" +
              element["desc_dmg_crd"] +
              "</td>" +
              "<td>" +
              element["area_plot_crd"] +
              "</td>" +
              "</tr>"
          );
        }
      }
    },
  });
}
function get_crop_damage_tb2(id_crop_damage) {
  $("#tb_crop_damage2").empty();
  $.ajax({
    url: "get/crop_damage_tb2",
    type: "POST",
    data: {
      id_crop_damage: id_crop_damage,
    },
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    success: function (respuesta) {
      tb_crop_damage2 = respuesta;
      // var r = JSON.parse(respuesta);
      for (const key in respuesta) {
        if (Object.hasOwnProperty.call(respuesta, key)) {
          const element = respuesta[key];
          // console.log(element);
          $("#tb_crop_damage2").append(
            "<tr>" +
              "<td>" +
              element["num_stools"] +
              "</td>" +
              "<td>" +
              element["amount"] +
              "</td>" +
              "<td>" +
              element["age_plants"] +
              "</td>" +
              "<td>" +
              element["stage_mat"] +
              "</td>" +
              "<td>" +
              element["cost_plant"] +
              "</td>" +
              "<td>" +
              element["tot_val"] +
              "</td>" +
              "<td>" +
              element["ofc_collec"] +
              "</td>" +
              "<td>" +
              element["cert_by"] +
              "</td>" +
              "<td>" +
              element["remark_stools"] +
              "</td>" +
              "</tr>"
          );
        }
      }
    },
  });
}

function to_pdf_cropdamage(crop) {
  let doc = new jsPDF("l", "pt", "letter");
  doc.setFont("helvetica");
  doc.setFontSize(12);
  // NORMAL FONT TYPE
  doc.setFontType("normal");
  doc.text(300, 30, "MINISTRY OF AGRICULTURE");
  doc.text(320, 55, "EXTENSION DIVISION");
  // BOLD FONT TYPE
  doc.setFontType("bold");
  doc.text(320, 80, "CROP DAMAGE DATA");
  doc.setFontSize(11);
  doc.text(
    100,
    120,
    "EXTENSION DISTRICT: " +
      crop["cdf_ext_dist"] +
      "    DATE OF DISASTER: " +
      crop["cdf_date_dis"] +
      "    TYPE OF DISASTER: " +
      crop["cdf_typ_dis"]
  );

  var tb1 = doc.autoTableHtmlToJson(document.getElementById("t-crop_damage1"));
  var currentpage = 0;
  var footer = function (data) {
    if (currentpage < doc.internal.getNumberOfPages()) {
      doc.setFontSize(10);
      doc.setFontStyle("normal");
      doc.text(
        "Copyright (c) XYZ. All rights reserved.",
        data.settings.margin.left,
        doc.internal.pageSize.height - 3
      );
      currentpage = doc.internal.getNumberOfPages();
    }
  };

  doc.autoTable(tb1.columns, tb1.data, {
    startY: 145,
    afterPageContent: footer,
    margin: { horizontal: 10 },
    showHeader: "everyPage",
    tableLineColor: 200,
    tableLineWidth: 0,
    height: "auto",
    bodyStyles: {
      valign: "top",
      minCellHeight: 8,
    },
    headerStyles: {
      fillColor: "#30aa4c",
      minCellHeight: 8,
      fontSize: 10,
      cellPadding: 2,
    },
    styles: {
      overflow: "linebreak",
      fontSize: 10,
      cellPadding: 2,
    },

    columnStyles: {
      // 10: { columnWidth: 39 },

      text: { columnWidth: "auto" },
      nil: { halign: "right" },
      tgl: { halign: "right" },
    },
    theme: "grid",
    // tableWidth: 'auto',
  });
  doc.rect(10, doc.autoTableEndPosY() + 10, 772, 20, "S");
  doc.setFillColor(48, 170, 76);
  doc.rect(314, doc.autoTableEndPosY() + 10, 230, 20, "F");
  doc.setFontSize("10");
  doc.setTextColor(255, 255, 255);
  doc.text(
    330,
    doc.autoTableEndPosY() + 22,
    "This Section for Head Office  use only"
  );
  var tb2 = doc.autoTableHtmlToJson(document.getElementById("t-crop_damage2"));
  doc.autoTable(tb2.columns, tb2.data, {
    startY: doc.autoTableEndPosY() + 30,
    afterPageContent: footer,
    margin: { horizontal: 10 },
    showHeader: "everyPage",
    tableLineColor: 200,
    tableLineWidth: 0,
    height: "auto",
    bodyStyles: {
      valign: "top",
      minCellHeight: 8,
    },
    headerStyles: {
      fillColor: "#30aa4c",
      minCellHeight: 8,
      fontSize: 10,
      cellPadding: 2,
    },
    styles: {
      overflow: "linebreak",
      fontSize: 10,
      cellPadding: 2,
    },

    columnStyles: {
      // 0: { fillColor: '#30aa4c' },

      text: { columnWidth: "auto" },
      nil: { halign: "right" },
      tgl: { halign: "right" },
    },
    theme: "grid",
  });

  window.open(doc.output("bloburl"));
}

// CROP DAMAGE FORM
function add_cropdmg() {
  Nrows = Nrows + 1;

  $("#tbody_crop_damage").append(
    '<tr data-row="' +
      Nrows +
      '">' +
      '<input type="hidden" value="" name="id_cd_table1">' +
      '<td><input style="width: 200px;" type="text" name="farmer_name_crd" placeholder="" style="width: 100px" class="form-control farmer_name_crd"></td>' +
      '<td><input style="width: 200px;" type="date" name="visit_date_crd" placeholder="" style="width: 100px" class="form-control visit_date_crd"></td>' +
      '<td><input style="width: 200px;" type="text" name="farmer_reg_crd" placeholder="" style="width: 100px" class="form-control farmer_reg_crd"></td>' +
      '<td><input style="width: 200px;" type="text" name="contact_crd" placeholder="" style="width: 100px" class="form-control contact_crd"></td>' +
      '<td><input list="cropdmg_datalist" name="cropdmg_name" class="form-control cropdmg_name" style="width: 200px;"></td>' +
      '<td><input list="varietydmg_datalist' +
      Nrows +
      '" name="crop_var_crd" class="form-control crop_var_crd" style="width: 200px" id="varietydmg_list' +
      Nrows +
      '"><datalist id="varietydmg_datalist' +
      Nrows +
      '"></datalist></td>' +
      '<td><input style="width: 200px;" type="text" name="location_crd" placeholder="" style="width: 100px" class="form-control location_crd"></td>' +
      '<td><input style="width: 200px;" type="number" name="tot_acre_crd" placeholder="" style="width: 100px" class="form-control tot_acre_crd"></td>' +
      '<td><input style="width: 200px;" type="text" name="desc_dmg_crd" placeholder="" style="width: 100px" class="form-control desc_dmg_crd"></td>' +
      '<td><input style="width: 200px;" type="number" name="area_plot_crd" placeholder="" style="width: 100px" class="form-control area_plot_crd"></td>' +
      '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
      "</tr>"
  );
}
function add_stools() {
  $("#tbody_stools").append(
    "<tr>" +
      '<input type="hidden" value="" name="id_cd_stool">' +
      '<td><input  style="width: 200px;"type="number" value="0" name="num_stools" style="width: 100px" placeholder="" class="form-control num_stools"></td>' +
      '<td><input style="width: 200px;" type="number" value="0" name="amount" style="width: 100px" placeholder="" class="form-control amount"></td>' +
      '<td><input style="width: 200px;" type="number" value="0" name="age_plants" style="width: 100px" placeholder="" class="form-control age_plants"></td>' +
      '<td><input style="width: 200px;" type="text" name="stage_mat" placeholder="" style="width: 100px" class="form-control stage_mat"></td>' +
      '<td><input style="width: 200px;" type="number" value="0" name="cost_plant" style="width: 100px" placeholder="" class="form-control cost_plant"></td>' +
      '<td><input style="width: 200px;" type="number" value="0" name="tot_val" style="width: 100px" placeholder="" class="form-control tot_val"></td>' +
      '<td><input style="width: 200px;" type="text" name="ofc_collec" placeholder="" style="width: 100px" class="form-control ofc_collec"></td>' +
      '<td><input style="width: 200px;" type="text" name="cert_by" placeholder="" style="width: 100px" class="form-control cert_by"></td>' +
      '<td><input style="width: 200px;" type="text" name="remark_stools" placeholder="" style="width: 100px" class="form-control remark"></td>' +
      '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
      "</tr>"
  );
}
$("#submit_crop_damage").on("click", function () {
  // $("form").submit(function () {

  var ext = $("#cdf_ext_dist").val();
  var date_dis = $("#cdf_date_dis").val();
  var typ_dis = $("#cdf_typ_dis").val();
  show_spin("submit_crop_damage", "spin_crop_dmg", "not_spin_cdmg");
  var url_variable;
  if ($("input[name='id_crop_damage']").val() != "") {
    url_variable = "update/crop_damage";

    var id_crop_damage = $("input[name='id_crop_damage']").val();
  } else {
    url_variable = "insert/crop_damage";
    var id_crop_damage = "";
  }
  // console.log(ext, date_dis, typ_dis);
  $.ajax({
    url: url_variable,
    type: "POST",
    data: {
      id_crop_damage: id_crop_damage,
      cdf_ext_dist: ext,
      cdf_date_dis: date_dis,
      cdf_typ_dis: typ_dis,
    },
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    success: function (respuesta) {
      var r = JSON.parse(respuesta);
      setTimeout(function () {
        insert_crop_damage_tb1(r);
      }, 1000);
      setTimeout(function () {
        insert_crop_damage_tb2(r);
      }, 1000);
    },
  }).done(function () {
    cropDamage_table.ajax.reload();
    setTimeout(function () {
      fillEmptyInputDataCRD();
      hide_spin("submit_crop_damage", "spin_crop_dmg", "not_spin_cdmg");
      $("#alert_crop_dmg").html("The register has been saved succesfully");
      $("#alert_crop_dmg").removeClass("d-none");
    }, 1000);
  });
});
function insert_crop_damage_tb1(id_crop_damage) {
  var url_variable;
  if ($("input[name='id_cd_table1']").val() != "") {
    console.log("update");
    url_variable = "update/crop_damage_tb1";
  } else {
    console.log("insert");
    url_variable = "insert/crop_damage_tb1";
  }
  $("#tbody_crop_damage tr").each(function () {
    var id_cd_table1 = $(this).find("input[name='id_cd_table1']").val();
    var farmer_name_crd = $(this).find(".farmer_name_crd").val();
    var visit_date_crd = $(this).find(".visit_date_crd").val();
    var farmer_reg_crd = $(this).find(".farmer_reg_crd").val();
    var contact_crd = $(this).find(".contact_crd").val();
    var cropdmg_name = $(this).find(".cropdmg_name").val();
    var crop_var_crd = $(this).find(".crop_var_crd").val();
    var location_crd = $(this).find(".location_crd").val();
    var tot_acre_crd = $(this).find(".tot_acre_crd").val();
    var desc_dmg_crd = $(this).find(".desc_dmg_crd").val();
    var area_plot_crd = $(this).find(".area_plot_crd").val();
    $.ajax({
      url: url_variable,
      type: "POST",
      headers: { "X-Requested-With": "XMLHttpRequest" },
      dataType: "json",
      data: {
        id_cd_table1: id_cd_table1,
        farmer_name_crd: farmer_name_crd,
        visit_date_crd: visit_date_crd,
        farmer_reg_crd: farmer_reg_crd,
        contact_crd: contact_crd,
        cropdmg_name: cropdmg_name,
        crop_var_crd: crop_var_crd,
        location_crd: location_crd,
        tot_acre_crd: tot_acre_crd,
        desc_dmg_crd: desc_dmg_crd,
        area_plot_crd: area_plot_crd,
        id_crop_damage: id_crop_damage,
      },
      success: function (respuesta) {
        console.log(respuesta);
        // var r = JSON.parse(respuesta);
        // console.log(r);
      },
    });
  });
}
function insert_crop_damage_tb2(id_crop_damage) {
  var url_variable;
  if ($("input[name='id_cd_stool']").val() != "") {
    url_variable = "update/crop_damage_tb2";
  } else {
    url_variable = "insert/crop_damage_tb2";
  }
  $("#tbody_stools tr").each(function () {
    var id_cd_stool = $(this).find("input[name='id_cd_stool']").val();
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
      url: url_variable,
      type: "POST",
      headers: { "X-Requested-With": "XMLHttpRequest" },
      dataType: "json",
      data: {
        id_cd_stool: id_cd_stool,
        num_stools: num_stools,
        amount: amount,
        age_plants: age_plants,
        stage_mat: stage_mat,
        cost_plant: cost_plant,
        tot_val: tot_val,
        ofc_collec: ofc_collec,
        cert_by: cert_by,
        remark_stools: remark_stools,
        id_crop_damage: id_crop_damage,
      },
      success: function (respuesta) {
        console.log(respuesta);
        // var r = JSON.parse(respuesta);
        // console.log(r);
      },
    });
  });
}
// //////////////////////////////////////////////
// EDIT CROP DAMAGE
function edit_row_cropdmg(data) {
  $("#cropdamage").collapse("toggle");
  $("input[name='id_crop_damage']").val(data["id_crop_damage"]);
  $("input[name='cdf_ext_dist']").val(data["cdf_ext_dist"]);
  $("input[name='cdf_date_dis']").val(data["cdf_date_dis"]);
  $("input[name='cdf_typ_dis']").val(data["cdf_typ_dis"]);
  $("#tbody_crop_damage").empty();
  for (const key in tb_crop_damage1) {
    if (Object.hasOwnProperty.call(tb_crop_damage1, key)) {
      const element = tb_crop_damage1[key];
      $("#tbody_crop_damage").append(`<tr data-row="1">
            <input type="hidden" value="${element["id_cd_table1"]}" name="id_cd_table1">
                                    <td><input type="text" style="width: 200px;" name="farmer_name_crd" placeholder="" class="form-control farmer_name_crd" value="${element["farmer_name_crd"]}"></td>
                                    <td><input type="date" style="width: 200px;" name="visit_date_crd" placeholder="" class="form-control visit_date_crd" value="${element["visit_date_crd"]}"></td>
                                    <td><input type="text" style="width: 200px;" name="farmer_reg_crd" placeholder="" class="form-control farmer_reg_crd" value="${element["farmer_reg_crd"]}"></td>
                                    <td><input type="text" style="width: 200px;" name="contact_crd" placeholder="" class="form-control contact_crd" value="${element["contact_crd"]}"></td>
                                    <td><input list="cropdmg_datalist" name="cropdmg_name" class="form-control cropdmg_name" value="${element["cropdmg_name"]}" style="width: 200px;"><datalist id="cropdmg_datalist"></datalist></td>
                                    <td><input list="varietydmg_datalist1" name="crop_var_crd" class="form-control crop_var_crd" value="${element["crop_var_crd"]}" style="width: 200px" id="varietydmg_list1"><datalist id="varietydmg_datalist1"></datalist></td>
                                    <td><input type="text" style="width: 200px;" name="location_crd" placeholder="" class="form-control location_crd" value="${element["location_crd"]}"></td>
                                    <td><input type="number" style="width: 200px;" step="any" name="tot_acre_crd" placeholder="" class="form-control tot_acre_crd" value="${element["tot_acre_crd"]}"></td>
                                    <td><input type="text" style="width: 200px;" name="desc_dmg_crd" placeholder="" class="form-control desc_dmg_crd" value="${element["desc_dmg_crd"]}"></td>
                                    <td><input type="number" style="width: 200px;" step="any" name="area_plot_crd" placeholder="" class="form-control area_plot_crd" value="${element["area_plot_crd"]}"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>`);
    }
  }
  getCropCDM();
  $("#tbody_stools").empty();
  for (const key in tb_crop_damage2) {
    if (Object.hasOwnProperty.call(tb_crop_damage2, key)) {
      const element = tb_crop_damage2[key];
      $("#tbody_stools").append(`<tr>
            <input type="hidden" value="${element["id_cd_stool"]}" name="id_cd_stool">
                                    <td><input type="number" style="width: 200px;" value="0" step="any" name="num_stools" placeholder="" class="form-control num_stools" value="${element["num_stools"]}"></td>
                                    <td><input type="number" style="width: 200px;" value="0" step="any" name="amount" placeholder="" class="form-control amount" value="${element["amount"]}"></td>
                                    <td><input type="number" style="width: 200px;" value="0" step="any" name="age_plants" placeholder="" class="form-control age_plants" value="${element["age_plants"]}"></td>
                                    <td><input type="text" style="width: 200px;" name="stage_mat" placeholder="" class="form-control stage_mat" value="${element["stage_mat"]}"></td>
                                    <td><input type="number" style="width: 200px;" value="0" step="any" name="cost_plant" placeholder="" class="form-control cost_plant" value="${element["cost_plant"]}"></td>
                                    <td><input type="number" style="width: 200px;" value="0" step="any" name="tot_val" placeholder="" class="form-control tot_val" value="${element["tot_val"]}"></td>
                                    <td><input type="text" style="width: 200px;" name="ofc_collec" placeholder="" class="form-control ofc_collec" value="${element["ofc_collec"]}"></td>
                                    <td><input type="text" style="width: 200px;" name="cert_by" placeholder="" class="form-control cert_by" value="${element["cert_by"]}"></td>
                                    <td><input type="text" style="width: 200px;" name="remark_stools" placeholder="" class="form-control remark_stools" value="${element["remark_stools"]}"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>`);
    }
  }
}
// ///////////////
function delete_row_cropdmg(data) {
  $.ajax({
    url: "delete/crop_damage",
    type: "POST",
    data: {
      id_crop_damage: data["id_crop_damage"],
    },
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
    },
  });
  cropDamage_table.ajax.reload();
}
