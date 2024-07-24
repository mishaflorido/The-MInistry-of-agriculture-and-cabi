var froad_table;
var county_road;
var sub_county;
var village;
var count_row = 2;
// Parish and county functions
$(document).on("change", ".select_county", function () {
  // console.log($(this).parent().parent().find("select[name='f_subcounty']").html());
  var sub_c = $(this).parent().parent().find("select[name='f_subcounty']");

  sub_c.html("");
  sub_c.append(
    "<option value='default' class='option_1' selected readonly>Sub County Select (First Select County)</option>"
  );
  for (const key in sub_county) {
    if (Object.hasOwnProperty.call(sub_county, key)) {
      const element = sub_county[key];

      if (element["id_lv1"] == $(this).val())
        sub_c.append(
          "<option class='sub_county' value='" +
            element["id_lv2"] +
            "'>" +
            element["name_lv2"] +
            "</option>"
        );
    }
  }
});
$(document).on("change", ".select_subcounty", function () {
  var vill = $(this).parent().parent().find("datalist");
  var inp = $(this).parent().parent().find("input[name='name=f_village']");
  vill.empty();
  inp.val("");

  for (const key in village) {
    if (Object.hasOwnProperty.call(village, key)) {
      const element = village[key];

      if (element["id_lv2"] == $(this).val())
        vill.append(
          "<option class='" +
            element["name_lv3"] +
            " ' value='" +
            element["name_lv3"] +
            "' id='" +
            element["id_lv3"] +
            "'></option>"
        );
    }
  }
});
// /////////////////////////////////////
// Filled Empty Input Data

function fillEmptyInputData() {
  $(".farm_roads input[type='date']").val("");
  $(".farm_roads input[type='hidden']").val("");
  $("#tbody_farm_road").empty();
  $("#tbody_farm_road").append(`
        <tr>
        <td> <select style="width: auto;" name="f_county" class="form-control select_county">
        <option value="default" selected readonly>County Select</option>
        </select></td>
        <td> <select style="width: 200px;" name="f_subcounty" class="form-control select_subcounty">
        <option value="default" selected readonly>Sub County Select (First Select County)</option>
        </select>
        </td>
        <td><input style="width: 200px" list="list_comp_FR" class="form-control" name="f_village" autocomplete="off" placeholder="Click To select">
        <datalist id="list_comp_FR">
        </datalist>
        </td>
        <td><input style="width: auto;" type="text" name="road_name" placeholder="" class="form-control road_name" required></td>
        <td><input style="width: 200px;" type="text" name="road_length" placeholder="" class="form-control road_length" required></td>
        <td><input style="width: 200px;" type="number" name="num_farm" placeholder="" class="form-control num_farm" required></td>
        <td><input style="width: 200px;" type="text" name="agr_act" placeholder="" class="form-control agr_act" required></td>
        <td><textarea style="width: 200px;" type="text" name="work" placeholder="" class="form-control work" rows="1" required></textarea></td>
        <td><textarea style="width: 200px;" type="text" name="remark" placeholder="" class="form-control remark" rows="1" required></textarea></td>
        <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        </tr>
    `);
  getCounty();
}
// ////////////////////
function getCounty() {
  // Get county
  $.ajax({
    method: "get",
    url: "get/county",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    success: function (result) {
      county_road = JSON.parse(result);

      for (const key in county_road) {
        if (Object.hasOwnProperty.call(county_road, key)) {
          const element = county_road[key];

          $(".select_county").append(
            "<option value='" +
              element["id_lv1"] +
              "'>" +
              element["name_lv1"] +
              "</option>"
          );
        }
      }
    },
  });
}
$(document).ready(function () {
  getCounty();
  // Get sub-county
  $.ajax({
    method: "get",
    url: "get/parish",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    success: function (result) {
      // console.log(result);
      sub_county = JSON.parse(result);
    },
  });
  // //////////////////
  // Get village
  $.ajax({
    method: "get",
    url: "get/district",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    success: function (result) {
      village = JSON.parse(result);
      // console.log(district);
    },
  });
  // //////////////////
  setInterval(function () {
    froad_table.ajax.reload();
  }, 180000);
  get_farmRoad_toreport($("#date_farm_road").val());
  froad_table = $("#froad_table_report").DataTable({
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
        titleAttr: "To PDF",
        action: function () {
          var farmer = froad_table.row({ selected: true }).data();
          to_pdf_farmroad(farmer);
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
          var dca = froad_table.row({ selected: true }).data();
          if (dca == null) {
            alert("Please select a row to Edit");
          } else {
            edit_row_froad(dca);
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
          var dca = froad_table.row({ selected: true }).data();
          if (dca == null) {
            alert("Please select a row to Delet");
          } else {
            if (confirm("Want to Delete the row?")) {
              delete_row_froad(dca);
            }
          }
        },
      },
    ],
    ajax: {
      method: "GET",
      url: "get/farmRoad",
      dataSrc: "",
    },
    columns: [
      { data: "date_farm_road" },
      { data: "name_user" },
      { data: "name_lv1" },
      { data: "name_lv2" },
      { data: "name_lv3" },
      { data: "road_name" },
      { data: "road_length" },
      { data: "num_farm" },
      { data: "agr_act" },
      { data: "work" },
      { data: "remark" },
    ],
  });
  $("#listFR_consolidation_table_report").DataTable({
    select: {
      style: "single",
      blurable: true,
    },
    dom: '<"top"fB>rt<"bottom"lip><"clear">',
    stateSave: true,
    pagingType: "simple_numbers",
    buttons: [
      {
        extend: "print",
        text: "Print Table",
      },

      {
        extend: "excel",
        text: "Excel",
      },
    ],
    ajax: {
      method: "GET",
      url: "get/farmRoad",
      dataSrc: "",
    },
    columns: [
      { data: "date_farm_road" },
      { data: "name_user" },
      { data: "name_lv1" },
      { data: "name_lv2" },
      { data: "name_lv3" },
      { data: "road_name" },
      { data: "road_length" },
      { data: "num_farm" },
      { data: "agr_act" },
      { data: "work" },
      { data: "remark" },
    ],
  });
});

$("#date_farmroad_report").on("change", function () {
  console.log("change farm report");
  get_farmRoad_toreport($(this).val());
});
function to_pdf_farmroad() {
  let doc = new jsPDF("l", "pt", "a4");
  doc.setFont("helvetica");
  doc.setFontType("normal");
  doc.text(300, 30, "MINISTRY OF AGRICULTURE");
  doc.text(320, 55, "EXTENSION DIVISION");
  doc.setFontType("bold");
  doc.text(240, 80, "List of Farm Roads That Need Urgent Attention");

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
    styles: { overflow: "linebreak", theme: "grid" },
    headerStyles: { fillColor: "#30aa4c" },
  });
  window.open(doc.output("bloburl"));
}
function get_farmRoad_toreport(date_farm_road) {
  $("#tb_farm_road").empty();

  $.ajax({
    method: "POST",
    url: "get/farm_road_report",
    data: { date_farm_road: date_farm_road },
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    success: function (result) {
      for (const key in result) {
        if (Object.hasOwnProperty.call(result, key)) {
          const element = result[key];

          $("#tb_farm_road").append(
            "<tr>" +
              "<td>" +
              element["date_farm_road"] +
              "</td>" +
              "<td>" +
              element["name_user"] +
              "</td>" +
              "<td>" +
              element["name_lv1"] +
              "</td>" +
              "<td>" +
              element["name_lv2"] +
              "</td>" +
              "<td>" +
              element["name_lv3"] +
              "</td>" +
              "<td>" +
              element["road_name"] +
              "</td>" +
              "<td>" +
              element["road_length"] +
              "</td>" +
              "<td>" +
              element["num_farm"] +
              "</td>" +
              "<td>" +
              element["agr_act"] +
              "</td>" +
              "<td>" +
              element["work"] +
              "</td>" +
              "<td>" +
              element["remark"] +
              "</td>" +
              "</tr>"
          );
        }
      }
    },
  });
}
// FARMROAD FORM
function add_road() {
  console.log(county_road, " this is for road");
  var cadena = `<tr><td><select class="form-control select_county" style="width: auto;" name="f_county"  ><option value="default" selected readonly>County Select</option>`;
  for (const key in county_road) {
    if (Object.hasOwnProperty.call(county_road, key)) {
      const element = county_road[key];

      cadena +=
        "<option value='" +
        element["id_lv1"] +
        "'>" +
        element["name_lv1"] +
        "</option>";
    }
  }
  cadena += `</select></td>
        <td> <select style="width: 200px;" name="f_subcounty"  class="form-control select_subcounty">
        <option value="default" selected readonly>Sub County Select (First Select County)</option>
        </select>
        </td>
        <td><input style="width: 200px" list="list_comp_FR${count_row}" class="form-control" name="f_village" id="village_FR" autocomplete="off" placeholder="Click To select">
        <datalist id="list_comp_FR${count_row}">
        </datalist>
        </td>
        <td><input style="width: auto;" type="text" name="road_name" placeholder="" class="form-control road_name" required></td>
        <td><input style="width: 200px;" type="text" name="road_length" placeholder="" class="form-control road_length" required></td>
        <td><input style="width: 200px;" type="number" name="num_farm" placeholder="" class="form-control num_farm" required></td>
        <td><input style="width: 200px;" type="text" name="agr_act" placeholder="" class="form-control agr_act" required></td>
        <td><textarea style="width: 200px;" type="text" name="work" placeholder="" class="form-control work" rows="1" required></textarea></td>
        <td><textarea style="width: 200px;" type="text" name="remark" placeholder="" class="form-control remark" rows="1" required></textarea></td>
        <td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>
        </tr>`;
  $("#tbody_farm_road").append(cadena);

  count_row++;
}
function get_id_lv_fr(name, list) {
  var resp;
  // console.log("estoy aqui");
  $("#" + list + " option").each(function () {
    // console.log($(this).attr('class') + "Clase," + name + "nombre");
    if ($(this).attr("class") == name + " ") {
      // console.log("estoy aqui");
      resp = $(this).attr("id");
    }
  });
  // console.log(resp + 'Esta es el id ');
  return resp;
}
$("#submit_farm_road").on("click", function () {
  show_spin("submit_farm_road", "spin_farm_road", "not_spin_farm_road");

  var date_farm_road = $("#date_farm_road").val();
  $("#tbody_farm_road tr").each(function () {
    var url_variable;
    var id_lv1 = $(this).find("select[name='f_county']").val();
    var id_lv2 = $(this).find("select[name='f_subcounty']").val();
    var id_lv3 = get_id_lv_fr(
      $(this).find("input[name='f_village']").val(),
      $(this).find("datalist").attr("id")
    );
    var road_name = $(this).find(".road_name").val();
    var road_length = $(this).find(".road_length").val();
    var num_farm = $(this).find(".num_farm").val();
    var agr_act = $(this).find(".agr_act").val();
    var work = $(this).find(".work").val();
    var remark = $(this).find(".remark").val();
    var id_farm_road = $("input[name='id_farm_road']").val();
    if ($("input[name='id_farm_road']").val() != "") {
      url_variable = "update/farmRoad";
    } else {
      url_variable = "insert/farmRoad";
    }
    console.log(url_variable);

    $.ajax({
      url: url_variable,
      type: "POST",
      data: {
        id_farm_road: id_farm_road,
        date_farm_road: date_farm_road,
        id_lv1: id_lv1,
        id_lv2: id_lv2,
        id_lv3: id_lv3,
        road_name: road_name,
        road_length: road_length,
        num_farm: num_farm,
        agr_act: agr_act,
        work: work,
        remark: remark,
      },
      headers: { "X-Requested-With": "XMLHttpRequest" },
      dataType: "json",
      success: function (respuesta) {
        var r = JSON.parse(respuesta);
      },
    });
  });
  froad_table.ajax.reload();

  setTimeout(function () {
    fillEmptyInputData();

    hide_spin("submit_farm_road", "spin_farm_road", "not_spin_farm_road");
    $("#alert_farm_roads").html("The register has been saved succesfully");
    $("#alert_farm_roads").removeClass("d-none");
  }, 1000);
});

// ////////////////////////////////////////////////////////////////
function edit_row_froad(data) {
  // console.log(data);
  fillEmptyInputData();
  setTimeout(function () {
    $("#farm_roads").collapse("toggle");
    $("input[name='id_farm_road']").val(data["id_farm_roads"]);
    $("#date_farm_road").val(data["date_farm_road"]);
    $("#tbody_farm_road tr").each(function () {
      $("select[name='f_county']").val(data["id_lv1"]).trigger("change");
      $("select[name='f_subcounty']").val(data["id_lv2"]).trigger("change");
      $("input[name='f_village']").val(data["name_lv3"]);
      $("input[name='road_name']").val(data["road_name"]);
      $("input[name='road_length']").val(data["road_length"]);
      $("input[name='num_farm']").val(data["num_farm"]);
      $("input[name='agr_act']").val(data["agr_act"]);
      $("textarea[name='work']").val(data["work"]);
      $("textarea[name='remark']").val(data["remark"]);
    });
  }, 300);
}
function delete_row_froad(data) {
  $.ajax({
    url: "delete/farmRoad",
    type: "POST",
    data: {
      id_farm_roads: data["id_farm_roads"],
    },
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
    },
  });
  froad_table.ajax.reload();
}
