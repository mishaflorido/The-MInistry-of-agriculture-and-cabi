var county;
var sub_county;
var village;
var variety;
const coordinates = document.getElementById("coordinates");
// Filled Empty Input Data
function filledEmptyInput() {
  console.log("filled empty input");
  $("#dca_reg_form input[type='text']").val("");
  $("#dca_reg_form input[type='hidden']").val("");
  $("#dca_reg_form input[type='number']").not("input[name='yfs_dca']").val("");
  $("#dca_reg_form input[type='checkbox']").prop("checked", false);
  $("#dca_reg_form textarea").val("");
  $("#dca_reg_form input[type='date']").val("");
  $("#village_id").val("");
  $("#id_plant_doc").val("");
  $("#crop_dca_list").val("");
  $("#variety_dca").val("");
  $("#sub_county_list_id").empty();
  $("#list_dca_variety").empty();
  $("#sub_county_list_id").append(
    "<option value='0' class='option_1' selected readonly>Sub County Select (First Select County)</option>"
  );
  // $("#county_list_id").val("default");
  // $("#unit_apselect").val("default");
  // $("#per_cafectedSelect").val("default");
  $("#dca_reg_form select").val("0");
  // document.getElementById("option_1").value = "defaultValue";
  // $("#option_1").attr("selected", "selected")
}
// //////////////////////
// DCA RELOAD TABLE
function reload_dca_table() {
  console.log("Reloading table...");
  dca_toPOMS_table.ajax.reload();
}

// //////////////////////////
$(document).ready(function () {
  mapboxgl.accessToken =
    "pk.eyJ1IjoibWlndWVsZmxvcmlkbyIsImEiOiJja3VoZHRocHUyZGpkMm5vMzA5eWxwdHc5In0.U3l5KH2nMBy87fQBrQTMjg";
  var map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/mapbox/streets-v11",
    center: [-61.68262052668253, 12.133375886867], // starting position [lng, lat],
    zoom: 10, // starting zoom
  });

  const marker = new mapboxgl.Marker({
    draggable: true,
  })
    .setLngLat([-61.68262052668253, 12.133375886867])
    .addTo(map);
  function onDragEnd() {
    const lngLat = marker.getLngLat();
    coordinates.style.display = "block";
    coordinates.innerHTML = `Longitude: ${lngLat.lng}<br />Latitude: ${lngLat.lat}`;
    $("input[name='coordinates_lat']").val(lngLat.lat);
    $("input[name='coordinates_lng']").val(lngLat.lng);
  }
  map.on("click", (e) => {
    console.log(e);
    marker.setLngLat([e.lngLat.lng, e.lngLat.lat]);
    onDragEnd();
  });
  $("#id_dca_form").change(function () {
    console.log("change input");
    onDragEnd();
  });
  marker.on("dragend", onDragEnd);
  // Get Varietys
  $.ajax({
    method: "get",
    url: "get/variety",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    success: function (result) {
      variety = JSON.parse(result);
    },
  });
  // Get Plant Doctor
  $.ajax({
    method: "get",
    url: "get/plant_doctor",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    success: function (result) {
      county = JSON.parse(result);

      for (const key in county) {
        if (Object.hasOwnProperty.call(county, key)) {
          const element = county[key];

          $("#plant_doctor_list").append(
            "<option class='" +
              element["pdoc_name"] +
              element["pdoc_lastname"] +
              "' id='" +
              element["id_plant_doc"] +
              "' value='" +
              element["pdoc_name"] +
              element["pdoc_lastname"] +
              "'></option>"
          );
        }
      }
    },
  });

  get_complementary();
  // Get county
  $.ajax({
    method: "get",
    url: "get/county",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    success: function (result) {
      county = JSON.parse(result);

      for (const key in county) {
        if (Object.hasOwnProperty.call(county, key)) {
          const element = county[key];

          $("#county_list_id").append(
            "<option value='" +
              element["id_lv1"] +
              "'>" +
              element["name_lv1"] +
              "</option>"
          );
          $("#CE_county_list_id").append(
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

  // Get Crop
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
          $("#crop_dca").append(
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
});
function get_complementary() {
  // Get Complementary
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
}
$(".county_list").on("change", function () {
  let sublist = "#sub_county_list_id";
  if ($(this).attr("id") != "county_list_id") {
    sublist = "#CE_sub_county_list_id";
  }

  $(sublist).empty();
  $(sublist).append(
    "<option value='0' class='option_1' selected readonly>Sub County Select (First Select County)</option>"
  );
  for (const key in sub_county) {
    if (Object.hasOwnProperty.call(sub_county, key)) {
      const element = sub_county[key];

      if (element["id_lv1"] == $(this).val())
        $(sublist).append(
          "<option class='sub_county' value='" +
            element["id_lv2"] +
            "'>" +
            element["name_lv2"] +
            "</option>"
        );
    }
  }
});
$("input[name='Cur_cnt']").on("change", function () {
  if ($("#id_Cur_cnt_yes").prop("checked")) {
    $("#id_curr_yes_option").removeClass("d-none");
  } else {
    $("#id_curr_yes_option").addClass("d-none");
  }
});
$(".subcounty_list").on("change", function () {
  let sublist = "#list_comp";
  let inputID = "#village_id";

  if ($(this).attr("id") != "sub_county_list_id") {
    sublist = "#CE_list_comp";
    inputID = "#CE_village_id";
  }

  $(sublist).empty();
  $(inputID).val("");

  for (const key in village) {
    if (Object.hasOwnProperty.call(village, key)) {
      const element = village[key];

      if (element["id_lv2"] == $(this).val())
        $(sublist).append(
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

$("#crop_dca_list").on("change", function () {
  // console.log("valor" + $(this).val());
  var id_crop = get_id_crop($(this).val(), "crop_dca");
  $("#variety_dca").val("");
  $("#list_dca_variety").empty();
  for (const key in variety) {
    if (Object.hasOwnProperty.call(variety, key)) {
      const element = variety[key];
      if (element["id_crop"] == id_crop) {
        $("#list_dca_variety").append(
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
function get_id_lv(name, list) {
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

$("form").submit(function (event) {
  if ($(this).attr("id") == "dca_reg_form") {
    event.preventDefault();
    show_spin("btn_dca_form", "spin_dca", "not_spin_dca");
    var formData = new FormData($(this)[0]);
    var id_plant_doc = get_id_crop(
      formData.get("id_plant_doc"),
      "plant_doctor_list"
    );
    var url_variable;
    var id_crop = get_id_crop(formData.get("id_crop"), "crop_dca");
    var id_vari = get_id_crop(formData.get("id_variety"), "list_dca_variety");
    // var id_lv3 = get_id_lv(formData.get("f_village"), "list_comp");

    var id_lv3 = village.filter(function (f) {
      return f.name_lv3 == formData.get("f_village");
    });

    if (id_lv3.length != 0) {
      formData.append("id_lv3", id_lv3[0].id_lv3);
    } else {
      // hide_spin("btn_dca_form", "spin_dca", "not_spin_dca");
      // alert('Please Save Complementary Address');
      //    var element = document.getElementById("village_id");
      //    $('#village_id').addClass('border border-warning border-5');
      //    element.scrollIntoView();
      formData.append("id_lv3", 0);
    }
    var dev_stage = get_string_check(
      "development_stage1",
      "development_stage2"
    );
    var pp_afected = get_string_check("plant_afect1", "plant_afect2");
    var symtoms = get_string_check(
      "symtoms_checkboxes1",
      "symtoms_checkboxes2"
    );
    var sym_dist = get_string_check(
      "sym_dist_checkboxes1",
      "sym_dist_checkboxes2"
    );
    var rec_type = get_string_check(
      "recomendationType_checkboxes1",
      "recomendationType_checkboxes2"
    );

    // var type_user = $("#type_user");
    if ($("input[name='id_dca_form']").val() != "") {
      url_variable = "update/dca_form";
    } else {
      url_variable = "insert/dca_form";
    }
    formData.delete("id_crop");
    formData.delete("id_variety");
    formData.delete("symtoms");
    formData.delete("sym_dist");
    formData.delete("rec_type");
    formData.delete("id_plant_doc");
    formData.append("symtoms", symtoms);
    // formData.append("id_user", type_user);
    formData.append("sym_dist", sym_dist);
    formData.append("rec_type", rec_type);
    formData.append("id_crop", id_crop);
    formData.append("id_variety", id_vari);
    formData.append("dev_stage", dev_stage);
    formData.append("pp_afected", pp_afected);
    formData.append("id_plant_doc", id_plant_doc);
    formData.append("id_lv3", id_lv3[0].id_lv3);
    console.log(formData.get("id_lv3"), " id_lv3");
    console.log(formData.get("rec_type_other"));
    $.ajax({
      url: url_variable,
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {},
    }).done(function () {
      reload_dca_table();

      setTimeout(function () {
        filledEmptyInput();

        hide_spin("btn_dca_form", "spin_dca", "not_spin_dca");
        $(".alert_dca").html("The register has been saved succesfully");
        $(".alert_dca").removeClass("d-none");
      }, 1000);
    });
  }
});
function get_string_check(list1, list2) {
  var arr = [];
  $("#" + list1 + " div").each(function () {
    if ($(this).find("input").is(":checked")) {
      arr.push($(this).find("input").val());
      // cadena = cadena + $(this).find("input").val() + ",";
    }
  });
  $("#" + list2 + " div").each(function () {
    if ($(this).find("input").is(":checked")) {
      arr.push($(this).find("input").val());
      // cadena = cadena + $(this).find("input").val() + ",";
    }
  });
  console.log("Strings: ", arr.toString());
  return arr.toString();
}
$(".save_btn_scompl").on("click", function () {
  var r = confirm("Want to Save this complementary adress?");
  if (r) {
    let name_lv3 = "#village_id";
    let id_lv2 = "#sub_county_list_id";
    if ($(this).attr("id")) {
      name_lv3 = "#CE_village_id";
      id_lv2 = "#CE_sub_county_list_id";
    }
    $.ajax({
      url: "insert/complementary",
      type: "POST",
      data: {
        name_lv3: $(name_lv3).val(),
        id_lv2: $(id_lv2).val(),
      },
      headers: { "X-Requested-With": "XMLHttpRequest" },
      dataType: "json",
      success: function (respuesta) {
        var x = JSON.parse(respuesta);
        if (x == "1") {
          alert("Complement has been saved successfully");
          get_complementary();
        }
      },
    });
  }
});
