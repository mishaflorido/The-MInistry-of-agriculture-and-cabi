var pestapp_table;
var table_pestapp_toedit;
var crops_pestapp;
var count_row = 2;
// Filled Empty Input Data

function fillEmptyInputDataPESTAPP() {
  $(".frm_pestapp input[type='text']").val("");
  $(".frm_pestapp input[type='hidden']").val("");
  $("#tbody_pesticide").empty();
  $("#tbody_pesticide").append(`
    <tr>
    <td><input style="width: 200px;" class="form-control" type="text" name="farmer_name" placeholder="Farmer Name"></td>
    <td><input style="width: 200px;" class="form-control" type="text" name="farmer_ad" placeholder="Farmer address"></td>
    <td><input style="width: 200px;" class="form-control" type="text" name="farmer_tel" placeholder="Farmer Phone"></td>
    <td><input type="date" name="date_pestapp" placeholder="" class="form-control date_pestapp" style="width: 200px;"></td>
    <td>
        <div class="btn-group dropup">
            <button class="form-control dropdown-toggle text-end" style="width: 200px; overflow: hidden; white-space: nowrap;  text-overflow: ellipsis;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Select crops</button>
            <ul class="dropdown-menu" style="height: 100px; overflow: auto;" aria-labelledby="dropdownMenuClickableInside">
            </ul>
        </div>
        <!-- <input list="crop_pestapp_list" name="crop_pestapp" placeholder="" class="form-control crop_pestapp">
        <datalist id="crop_pestapp_list"></datalist> -->
    </td>
    <td><input type="text" style="width: 200px;" name="plsi_pestapp" placeholder="" class="form-control plsi_pestapp"></td>
    <td><input type="text" style="width: 200px;" name="targ_pestapp" placeholder="" class="form-control targ_pestapp"></td>
    <td><input type="text" style="width: 200px;" name="pest_pestapp" placeholder="" class="form-control pest_pestapp"></td>
    <td><input type="text" style="width: 200px;" name="rate_pestapp" placeholder="" class="form-control rate_pestapp"> </td>
    <td><input type="text" style="width: 200px;" name="amt_pestapp" placeholder="" class="form-control amt_pestapp"></td>
    <td><textarea style="width: 200px;" name="com_pestapp" placeholder="" class="form-control com_pestapp" rows="1"></textarea></td>
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
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    success: function (result) {
      // console.log(result);
      crops_pestapp = result;

      for (const key in result) {
        if (result.hasOwnProperty.call(result, key)) {
          const element = result[key];
          $(".dropdown-menu").append(`<li class="border">
                                                <div class="dropdown-item "><input style='margin-left:-60px' type="checkbox" value="${element["id_crop"]}" name="asd" id=""><span class="text-wrap nom_crop" style='margin-left:-40px'>${element["Crop_name"]}</span></div>
                                            </li>`);
        }
      }
    },
  });
}
$(document).on("click", ".dropdown-item", function () {
  var row = $(this).parent().parent().parent();
  var cadena = row.find("button").html();
  if ($(this).find("input").is(":checked")) {
    $(this).find("input").prop("checked", false);
    // console.log($(this).find(".nom_crop").html());
    var cropSelected = $(this).find(".nom_crop").html();
    var aux = cadena.split(",");
    aux = aux.filter(function (x) {
      // console.log(x, " = ", cropSelected);
      return x != cropSelected;
    });
    console.log(row.find("button").html());
    cadena = aux.toString();
  } else {
    $(this).find("input").prop("checked", true);

    if (row.find("button").html() == "Select crops") {
      cadena = $(this).find(".nom_crop").html();
    } else {
      cadena += "," + $(this).find(".nom_crop").html();
    }
  }
  row.find("button").html(cadena);
});

// ////////////////////
$(document).ready(function () {
  setInterval(function () {
    pestapp_table.ajax.reload();
  }, 180000);
  get_cropPestapp();
  pestapp_table = $("#pestapp_table_report").DataTable({
    select: {
      style: "single",
      blurable: true,
    },
    dom: '<"top"fB>rt<"bottom"lip><"clear">',
    lengthMenu: [10, 50, 100],
    pageLength: 10,
    stateSave: true,
    pagingType: "simple_numbers",
    buttons: [
      {
        text: "Individual form print",
        titleAttr: "To PDF",
        action: function () {
          if (
            $("#f_date").val() != "" &&
            $("#l_date").val() != "" &&
            $("#sup_sig_pdf").val() != ""
          ) {
            to_pdf_pestappform($("#sup_sig_pdf").val());
          } else {
            alert(
              "Please entrer the completed information (First Date, Last Date, Supervisor Signature)"
            );
          }
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
          if (
            $("#f_date").val() != "" &&
            $("#l_date").val() != "" &&
            $("#sup_sig_pdf").val() != ""
          ) {
            to_edit_pestapp($("#sup_sig_pdf").val());
          } else {
            alert(
              "Please entrer the completed information (First Date, Last Date, Supervisor Signature)"
            );
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
          var dca = pestapp_table.row({ selected: true }).data();
          if (dca == null) {
            alert("Please select a row to Delet");
          } else {
            if (confirm("Want to Delete the row?")) {
              delete_row_pestapp(dca);
            }
          }
        },
      },
    ],
    ajax: {
      method: "GET",
      url: "get/pest_app",
      dataSrc: "",
    },
    columns: [
      { data: "name_user" },
      { data: "spsig_pestapp" },
      { data: "farmer_name" },
      { data: "farmer_ad" },
      { data: "farmer_tel" },
      { data: "date_pestapp" },
      { data: "com_pestapp" },
    ],
  });
  $("#pestapp_consolidation_table_report").DataTable({
    select: {
      style: "multiple",
      blurable: true,
    },
    dom: '<"top"fB>rt<"bottom"lip><"clear">',
    stateSave: true,
    lengthMenu: [10, 50, 100],
    pageLength: 10,

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
      url: "get/pest_app",
      dataSrc: "",
    },
    columns: [
      { data: "name_user" },
      { data: "spsig_pestapp" },
      { data: "farmer_name" },
      { data: "farmer_ad" },
      { data: "farmer_tel" },
      { data: "date_pestapp" },
      { data: "com_pestapp" },
    ],
  });
});
$(document).on("change", ".to_search", function () {
  // console.log("busqueda");
  get_between_datepestapp();
});
function get_between_datepestapp() {
  $("#pestapp_tb1").empty();
  var f_date = $("#f_date").val();
  var l_date = $("#l_date").val();
  var sup_sig_pdf = $("#sup_sig_pdf").val();
  $.ajax({
    url: "get/pest_app_betweendate",
    type: "POST",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    data: {
      f_date: f_date,
      l_date: l_date,
      sup_sig_pdf: sup_sig_pdf,
    },
    success: function (respuesta) {
      table_pestapp_toedit = respuesta;
      for (const key in respuesta) {
        if (Object.hasOwnProperty.call(respuesta, key)) {
          const element = respuesta[key];
          console.log(element);
          $("#pestapp_tb1").append(
            "<tr>" +
              "<td>" +
              element["farmer_name"] +
              "</td>" +
              "<td>" +
              element["farmer_ad"] +
              "</td>" +
              "<td>" +
              element["farmer_tel"] +
              "</td>" +
              "<td>" +
              element["date_pestapp"] +
              "</td>" +
              "<td>" +
              element["crop_pestapp"] +
              "</td>" +
              "<td>" +
              element["plsi_pestapp"] +
              "</td>" +
              "<td>" +
              element["targ_pestapp"] +
              "</td>" +
              "<td>" +
              element["pest_pestapp"] +
              "</td>" +
              "<td>" +
              element["rate_pestapp"] +
              "</td>" +
              "<td>" +
              element["amt_pestapp"] +
              "</td>" +
              "<td>" +
              element["com_pestapp"] +
              "</td>" +
              "</tr>"
          );
        }
      }
    },
  });
}
function to_pdf_pestappform() {
  let doc = new jsPDF("p", "pt", "a4");
  doc.setFontType("bold");
  doc.setFontSize(16);
  doc.text(120, 30, "Pest Management Unit, Ministry of Agriculture");
  doc.setFontType("normal");
  doc.text(140, 55, "Pesticide Application – Field Record Sheet");
  doc.setFontSize(12);
  var res = doc.autoTableHtmlToJson(document.getElementById("pestapp_t1"));
  doc.autoTable(res.columns, res.data, {
    startY: 70,
    tableLineColor: 200,
    tableLineWidth: 0,
    margin: { horizontal: 30 },
    styles: { overflow: "linebreak" },
    headerStyles: { fillColor: "#30aa4c" },
    columnStyles: {
      //     0: { columnWidth: 80 },
      //     1: { columnWidth: 377 },
      // },
      theme: "grid",
    },
  });
  doc.text(
    30,
    doc.autoTableEndPosY() + 20,
    "Supervisor signature: " + $("#sup_sig_pdf").val()
  );

  window.open(doc.output("bloburl"));
}
function add_pesticide() {
  var cadena = ` <tr>
                    <td><input style="width: 200px;" class="form-control" type="text" name="farmer_name" placeholder="Farmer Name"></td>
                    <td><input style="width: 200px;" class="form-control" type="text" name="farmer_ad" placeholder="Farmer address"></td>
                    <td><input style="width: 200px;" class="form-control" type="text" name="farmer_tel" placeholder="Farmer Phone"></td>
                    <td><input type="date" name="date_pestapp" placeholder="" class="form-control date_pestapp" style="width: 200px;"></td>
                    <td>
                    <div class="btn-group dropup">
                    <button class="form-control dropdown-toggle text-end" style="width: 200px; overflow: hidden; white-space: nowrap;  text-overflow: ellipsis;" type="button" id="dropdownMenuClickableInside${count_row}" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Select crops</button>
                    <ul class="dropdown-menu" style="height: 100px; overflow: auto;" aria-labelledby="dropdownMenuClickableInside${count_row}">`;
  for (const key in crops_pestapp) {
    if (Object.hasOwnProperty.call(crops_pestapp, key)) {
      const element = crops_pestapp[key];

      cadena += `<li class="border">
                       <div class="dropdown-item "><input style='margin-left:-60px' type="checkbox" value="${element["id_crop"]}" name="asd" id=""><span class="text-wrap nom_crop" style='margin-left:-40px'>${element["Crop_name"]}</span></div>
                       </li>`;
    }
  }
  cadena += `</ul>
                                    </div>
                                    <!-- <input list="crop_pestapp_list" name="crop_pestapp" placeholder="" class="form-control crop_pestapp">
                                    <datalist id="crop_pestapp_list"></datalist> -->
                                </td>
                                <td><input style="width: 200px;" type="text" name="plsi_pestapp" placeholder="" class="form-control plsi_pestapp"></td>
                                <td><input style="width: 200px;" type="text" name="targ_pestapp" placeholder="" class="form-control targ_pestapp"></td>
                                <td><input style="width: 200px;" type="text" name="pest_pestapp" placeholder="" class="form-control pest_pestapp"></td>
                                <td><input style="width: 200px;" type="text" name="rate_pestapp" placeholder="" class="form-control rate_pestapp"> </td>
                                <td><input style="width: 200px;" type="text" name="amt_pestapp" placeholder="" class="form-control amt_pestapp"></td>
                                <td><textarea style="width: 200px;" name="com_pestapp" placeholder="" class="form-control com_pestapp" rows="1"></textarea></td>
                                <td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>
                            </tr>`;

  $("#tbody_pesticide").append(cadena);
  count_row++;
}
$("#btn_pestapp").on("click", function () {
  show_spin("btn_pestapp", "spin_pestapp", "not_spin_pestapp");
  var url_variable;

  $("#tbody_pesticide tr").each(function () {
    console.log($(this).find("input[name='id_pest_app']").val());
    if ($(this).find("input[name='id_pest_app']").val() !== undefined) {
      console.log("update");
      url_variable = "update/pest_app";
    } else {
      url_variable = "insert/pest_app";
      console.log("Insert");
    }
    var id_pest_app = $(this).find("input[name='id_pest_app']").val();
    var spsig_pestapp = $("#spsig_pestapp").val();

    var farmer_name = $(this).find("input[name='farmer_name']").val();
    var farmer_ad = $(this).find("input[name='farmer_ad']").val();
    var farmer_tel = $(this).find("input[name='farmer_tel']").val();
    var date_pestapp = $(this).find(".date_pestapp").val();
    // var crop_pestapp = get_id_crop($(this).find(".crop_pestapp").val(), 'crop_pestapp_list');
    var crop_pestapp = $(this).find("button").html();
    var plsi_pestapp = $(this).find(".plsi_pestapp").val();
    var targ_pestapp = $(this).find(".targ_pestapp").val();
    var pest_pestapp = $(this).find(".pest_pestapp").val();
    var rate_pestapp = $(this).find(".rate_pestapp").val();
    var amt_pestapp = $(this).find(".amt_pestapp").val();
    var com_pestapp = $(this).find(".com_pestapp").val();
    // console.log(crop_pestapp);
    $.ajax({
      url: url_variable,
      type: "POST",
      headers: { "X-Requested-With": "XMLHttpRequest" },
      dataType: "json",
      data: {
        id_pest_app: id_pest_app,
        spsig_pestapp: spsig_pestapp,
        farmer_name: farmer_name,
        farmer_ad: farmer_ad,
        farmer_tel: farmer_tel,
        date_pestapp: date_pestapp,
        crop_pestapp: crop_pestapp,
        plsi_pestapp: plsi_pestapp,
        targ_pestapp: targ_pestapp,
        pest_pestapp: pest_pestapp,
        rate_pestapp: rate_pestapp,
        amt_pestapp: amt_pestapp,
        com_pestapp: com_pestapp,
      },
      success: function (respuesta) {
        console.log(respuesta);
      },
    });
  });
  setTimeout(function () {
    pestapp_table.ajax.reload();
    fillEmptyInputDataPESTAPP();
    get_between_datepestapp();
    hide_spin("btn_pestapp", "spin_pestapp", "not_spin_pestapp");
    $("#alert_pestapp").html("The register has been saved succesfully");
    $("#alert_pestapp").removeClass("d-none");
  }, 1000);
});
function get_id_crop(name, list) {
  var resp;
  $("#" + list + " option").each(function () {
    // console.log($(this).attr('class') + "Clase," + name + "nombre");
    if ($(this).attr("class") == name) {
      // console.log("estoy aqui");
      resp = $(this).attr("id");
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

      var aux = element.crop_pestapp.split(",");

      var aux3 = crops_pestapp;
      var cont = 0;
      var cad = `<tr>
            <input type="hidden" name="id_pest_app" value="${element["id_pest_app"]}">
            <td><input style="width: 170px;" class="form-control" type="text" name="farmer_name" placeholder="Farmer Name" value='${element["farmer_name"]}'></td>
            <td><input style="width: 170px;" class="form-control" type="text" name="farmer_ad" placeholder="Farmer address" value='${element["farmer_ad"]}'></td>
            <td><input style="width: 150px;" class="form-control" type="text" name="farmer_tel" placeholder="Farmer Phone" value='${element["farmer_tel"]}'></td>
            <td><input type="date" name="date_pestapp" placeholder="" class="form-control date_pestapp" style="width: 100px;" value="${element["date_pestapp"]}"></td>
            <td>
            <div class="btn-group dropup">
            <button class="form-control dropdown-toggle text-end" style="width: 200px; overflow: hidden; white-space: nowrap;  text-overflow: ellipsis;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">${element.crop_pestapp}</button>
            <ul class="dropdown-menu" style="height: 100px; overflow: auto;" aria-labelledby="dropdownMenuClickableInside">`;
      for (let y = 0; y <= aux.length; y++) {
        const z = aux[y];
        var aux2 = aux3;
        // console.log("Estoy en el primer for ", aux2.length);
        for (let i = cont; i < aux3.length; i++) {
          // console.log("Estoy en el segundo for");
          const x = aux3[i];
          // console.log("valores ", x.Crop_name, " ", z);
          cont = i + 1;
          // console.log("Los Check");
          if (x.Crop_name == z) {
            // console.log("iguales ", x.Crop_name, " ", z);
            cad += `<li class="border">
                        <div class="dropdown-item "><input style='margin-left:-60px' type="checkbox" value="${x["id_crop"]}" name="asd"  checked><span class="text-wrap nom_crop" style='margin-left:-40px'>${x["Crop_name"]}</span></div>
                        </li>`;

            i = aux2.length;
          } else {
            cad += `<li class="border">
                        <div class="dropdown-item "><input style='margin-left:-60px' type="checkbox" value="${x["id_crop"]}" name="asd" ><span class="text-wrap nom_crop" style='margin-left:-40px'>${x["Crop_name"]}</span></div>
                        </li>`;
          }

          // aux2.shift();
        }
      }
      cad += `</ul></div>
            </td>
            <td><input type="text" name="plsi_pestapp" placeholder="" class="form-control plsi_pestapp" value="${element["plsi_pestapp"]}"></td>
            <td><input type="text" name="targ_pestapp" placeholder="" class="form-control targ_pestapp" value="${element["targ_pestapp"]}"></td>
            <td><input type="text" name="pest_pestapp" placeholder="" class="form-control pest_pestapp" value="${element["pest_pestapp"]}"></td>
            <td><input type="text" name="rate_pestapp" placeholder="" class="form-control rate_pestapp" value="${element["rate_pestapp"]}"> </td>
            <td><input type="text" name="amt_pestapp" placeholder="" class="form-control amt_pestapp" value="${element["amt_pestapp"]}"></td>
            <td><textarea style="overflow:hidden" name="com_pestapp" placeholder="" class="form-control com_pestapp" rows="1">${element["com_pestapp"]}</textarea></td>
            <td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>
            </tr>`;
      $("#tbody_pesticide").append(cad);
    }
  }
  // var aux = ['Atemoya', 'Banana', 'Breadnut'];
  // for (let y = 0; y < aux.length; y++) {
  //     const z = aux[y];
  //     for (let i = 0; i < crops_pestapp.length; i++) {
  //         const x = crops_pestapp[i];
  //         // console.log("Los Check");
  //         if (x.Crop_name == z) {
  //             console.log("iguales ", x.Crop_name, " ", z);

  //         }

  //     }

  // }
  // $('#tbody_pesticide').append('<datalist id="crop_pestapp_list"></datalist>');
  // get_cropPestapp();
}
// //////////
function delete_row_pestapp(data) {
  $.ajax({
    url: "delete/pest_app",
    type: "POST",
    data: {
      id_pest_app: data["id_pest_app"],
    },
    headers: { "X-Requested-With": "XMLHttpRequest" },
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
    },
  });
  pestapp_table.ajax.reload();
}
