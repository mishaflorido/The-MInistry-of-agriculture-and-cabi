function fillEmptyInputDataCEPI() {
  $(".praedial_lancery input[type='text']").val("");
  $(".praedial_lancery input[type='hidden']").val("");
  $("#tbody_produce").empty();
  $("#tbody_produce").append(`
    <tr>
        '<td><input list="crop_datalist" name="crop_name" class="form-control crop_name" style="width: auto"><datalist id="crop_datalist"></datalist></td>' +
        '<td><input list="variety_datalist1" name="variety" class="form-control variety" style="width: auto" id="variety_list1"><datalist id="variety_datalist1"></datalist></td>' +
        '<td><input type="number" name="plot_size" placeholder="" style="width: 200px" class="form-control plot_size"></td>' +
        '<td><input type="number" name="n_stools" placeholder="" style="width: 200px" class="form-control n_stools"></td>' +
        '<td><input type="date" name="date_planted" placeholder=""  class="form-control date_planted"></td>' +
        '<td><input type="text" name="stage_maturity" placeholder="" class="form-control stage_maturity"></td>' +
        '<td> <input type="date" name="harvest_date" placeholder="" class="form-control  harvest_date"> </td>' +
        '<td><input type="text" name="yield" placeholder="" class="form-control yield"></td>' +
        '<td><input type="text" name="activities_carried" placeholder="" class="form-control activities_carried"></td>' +
        '<td><input type="text" name="taq_arf_moa" placeholder="" class="form-control taq_arf_moa"></td>' +
        '<td><input type="number" name="n_farm_visits" placeholder="" style="width: 200px" class="form-control n_farm_visits"></td>' +
        '<td><input type="text" name="remarks" placeholder="" class="form-control remarks"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
    </tr>
    `);
}
var variety;
var Nrows = 1;
$(document).ready(function () {
  getCropCE();
  getVarietyCE();
});
// Get Variety
function getVarietyCE() {
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
$(document).on("change", "input[name=crop_name]", function () {
  // console.log("valor" + $(this).val());
  var id_crop = get_id_crop($(this).val(), "crop_datalist");
  let row = $(this).parents().parents().data("row");
  let datalist = $(this)
    .parents()
    .find("#variety_datalist" + row);
  console.log(row);
  $("#variety_list" + row).val("");
  $("#variety_datalist" + row).empty();
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
// Get Crop
function getCropCE() {
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
          $("#crop_datalist").append(
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
// //////////////

function add_praedial() {
  Nrows = Nrows + 1;
  $("#tbody_produce").append(
    '<tr data-row="' +
      Nrows +
      '">' +
      '<td><input list="crop_datalist" name="crop_name" class="form-control crop_name" style="width: auto"></td>' +
      '<td><input list="variety_datalist' +
      Nrows +
      '" name="variety" class="form-control variety" style="width: auto" id="variety_list' +
      Nrows +
      '"><datalist id="variety_datalist' +
      Nrows +
      '"></datalist></td>' +
      '<td><input type="number" name="plot_size" placeholder="" style="width: 200px" class="form-control plot_size"></td>' +
      '<td><input type="number" name="n_stools" placeholder="" style="width: 200px" class="form-control n_stools"></td>' +
      '<td><input type="date" name="date_planted" placeholder=""  class="form-control date_planted"></td>' +
      '<td><input type="text" name="stage_maturity" placeholder="" class="form-control stage_maturity"></td>' +
      '<td> <input type="date" name="harvest_date" placeholder="" class="form-control  harvest_date"> </td>' +
      '<td><input type="text" name="yield" placeholder="" class="form-control yield"></td>' +
      '<td><input type="text" name="activities_carried" placeholder="" class="form-control activities_carried"></td>' +
      '<td><input type="text" name="taq_arf_moa" placeholder="" class="form-control taq_arf_moa"></td>' +
      '<td><input type="number" name="n_farm_visits" placeholder="" style="width: 200px" class="form-control n_farm_visits"></td>' +
      '<td><input type="text" name="remarks" placeholder="" class="form-control remarks"></td>' +
      '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
      "</tr>"
  );
}
$("form").submit(function (event) {
  if ($(this).attr("class") == "praedial_lancery") {
    show_spin("lancery_btn_submit", "spin_lancery", "not_spin_lancery");
    // $(".spin").removeClass("d-none");
    // $(".not_spin").addClass("d-none");
    // $("#submit_form_farmer").attr("disabled", "disabled")
    event.preventDefault();
    var url_variable;
    var formData = new FormData($(this)[0]);

    if ($("input[name='id_praedial']").val() != "") {
      url_variable = "update/praedial";
    } else {
      url_variable = "insert/praedial";
    }
    var id_lv3 = village.filter(function (f) {
      return f.name_lv3 == formData.get("f_village");
    });
    if (id_lv3.length != 0) {
      formData.append("id_lv3", id_lv3[0].id_lv3);
    } else {
      formData.append("id_lv3", 0);
      //   hide_spin("lancery_btn_submit", "spin_lancery", "not_spin_lancery");
      //   alert("Please Save Complementary Address");
      //   var element = document.getElementById("CE_village_id");
      //   $("#CE_village_id").addClass("border border-warning border-5");
      //   element.scrollIntoView();
    }

    $.ajax({
      url: url_variable,
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {
        var r = JSON.parse(respuesta);
        setTimeout(function () {
          insert_weekly_data_collection(r);
        }, 1000);
      },
    }).done(function () {
      cropest_table.ajax.reload();
      setTimeout(function () {
        fillEmptyInputDataCEPI();
        hide_spin("lancery_btn_submit", "spin_lancery", "not_spin_lancery");
        $("#alert_lancery_programme").html(
          "The register has been saved succesfully"
        );
        $("#alert_lancery_programme").removeClass("d-none");
      }, 1000);
    });
  }
});
function insert_weekly_data_collection(id_praedial) {
  var url_weekly;
  if ($("input[name='id_praedial']").val() != "") {
    $("#tbody_produce tr").each(function () {
      var id_wdc = $(this).find(".id_wdc").val();
      var crop_name = $(this).find(".crop_name").val();
      var plot_size = $(this).find(".plot_size").val();
      var n_stools = $(this).find(".n_stools").val();
      var date_planted = $(this).find(".date_planted").val();
      var variety = $(this).find(".variety").val();
      var stage_maturity = $(this).find(".stage_maturity").val();
      var harvest_date = $(this).find(".harvest_date").val();
      var yield = $(this).find(".yield").val();
      var activities_carried = $(this).find(".activities_carried").val();
      var taq_arf_moa = $(this).find(".taq_arf_moa").val();
      var n_farm_visits = $(this).find(".n_farm_visits").val();
      var remarks = $(this).find(".remarks").val();

      $.ajax({
        url: "update/weekly_data_collector",
        type: "POST",
        headers: { "X-Requested-With": "XMLHttpRequest" },
        dataType: "json",
        data: {
          id_wdc: id_wdc,
          crop_name: crop_name,
          plot_size: plot_size,
          n_stools: n_stools,
          date_planted: date_planted,
          variety: variety,
          stage_maturity: stage_maturity,
          harvest_date: harvest_date,
          yield: yield,
          activities_carried: activities_carried,
          taq_arf_moa: taq_arf_moa,
          n_farm_visits: n_farm_visits,
          remarks: remarks,
          id_praedial: id_praedial,
        },
        success: function (respuesta) {
          console.log(respuesta);
        },
      });
    });
  } else {
    url_weekly = "insert/praedial";
    $("#tbody_produce tr").each(function () {
      var crop_name = $(this).find(".crop_name").val();
      var plot_size = $(this).find(".plot_size").val();
      var n_stools = $(this).find(".n_stools").val();
      var date_planted = $(this).find(".date_planted").val();
      var variety = $(this).find(".variety").val();
      var stage_maturity = $(this).find(".stage_maturity").val();
      var harvest_date = $(this).find(".harvest_date").val();
      var yield = $(this).find(".yield").val();
      var activities_carried = $(this).find(".activities_carried").val();
      var taq_arf_moa = $(this).find(".taq_arf_moa").val();
      var n_farm_visits = $(this).find(".n_farm_visits").val();
      var remarks = $(this).find(".remarks").val();

      $.ajax({
        url: "insert/weekly_data_collector",
        type: "POST",
        headers: { "X-Requested-With": "XMLHttpRequest" },
        dataType: "json",
        data: {
          crop_name: crop_name,
          plot_size: plot_size,
          n_stools: n_stools,
          date_planted: date_planted,
          variety: variety,
          stage_maturity: stage_maturity,
          harvest_date: harvest_date,
          yield: yield,
          activities_carried: activities_carried,
          taq_arf_moa: taq_arf_moa,
          n_farm_visits: n_farm_visits,
          remarks: remarks,
          id_praedial: id_praedial,
        },
        success: function (respuesta) {
          console.log(respuesta);
        },
      });
    });
  }
}
