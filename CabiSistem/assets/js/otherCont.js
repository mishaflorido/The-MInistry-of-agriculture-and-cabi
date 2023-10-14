var tb_pd;
var tb_crop;
var tb_parish;
var tb_village;
var tb_comp;
var editor;
var crop;
var tb_variety;
$(document).ready(function () {
  get_crops();
  get_forVariety();
  get_village();
  tb_pd = $("#tb_pdoctor").DataTable({
    autoWidth: true,
    pageLength: 10,
    dom: '<"top"fB>rt<"bottom"lip><"clear">',
    ajax: {
      method: "GET",
      url: "get/plant_doctor",
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        render: function (data, type, row) {
          // Combine the first and last names into a single table field
          return data.pdoc_name + " " + data.pdoc_lastname;
        },
      },
      { data: "pdoc_phone" },
      { data: "pdoc_email" },
      { data: "pdoc_ocupation" },
    ],
    select: true,
    buttons: [
      {
        text: "Edit Row",
        titleAttr: "Edit Row",
        action: function () {
          var pd = tb_pd.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to edit");
          } else {
            edit_pdoctor(pd);
          }
        },
      },
      {
        text: "Delete Row",
        titleAttr: "Delete Row",
        action: function () {
          var pd = tb_pd.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to delete");
          } else {
            delete_pdoctor(pd.id_plant_doc);
          }
        },
      },
    ],
  });
  tb_crop = $("#tb_crop").DataTable({
    autoWidth: true,
    pageLength: 5,
    dom: '<"top"fB>rt<"bottom"lip><"clear">',
    ajax: {
      method: "GET",
      url: "get/crop",
      dataSrc: "",
    },
    columns: [{ data: "Crop_name" }, { data: "Local_crop_name" }],
    select: true,
    buttons: [
      {
        text: "Edit Row",
        titleAttr: "Edit Row",
        action: function () {
          var pd = tb_crop.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to edit");
          } else {
            edit_crops(pd);
          }
        },
      },
      {
        text: "Delete Row",
        titleAttr: "Delete Row",
        action: function () {
          var pd = tb_crop.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to delete");
          } else {
            delete_crop(pd.id_crop);
          }
        },
      },
    ],
  });
  tb_parish = $("#tb_parish").DataTable({
    autoWidth: true,
    pageLength: 5,
    dom: '<"top"fB>rt<"bottom"lip><"clear">',
    ajax: {
      method: "GET",
      url: "get/county",
      dataSrc: "",
    },
    columns: [{ data: "name_lv1" }],
    select: true,
    buttons: [
      {
        text: "Edit Row",
        titleAttr: "Edit Row",
        action: function () {
          var pd = tb_parish.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to edit");
          } else {
            edit_parish(pd);
          }
        },
      },
      {
        text: "Delete Row",
        titleAttr: "Delete Row",
        action: function () {
          var pd = tb_parish.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to delete");
          } else {
            delete_parish(pd.id_lv1);
          }
        },
      },
    ],
  });
  tb_village = $("#tb_village").DataTable({
    autoWidth: true,
    pageLength: 5,
    dom: '<"top"fB>rt<"bottom"lip><"clear">',
    ajax: {
      method: "GET",
      url: "get/parish",
      dataSrc: "",
    },
    columns: [{ data: "name_lv2" }, { data: "name_lv1" }],
    select: true,
    buttons: [
      {
        text: "Edit Row",
        titleAttr: "Edit Row",
        action: function () {
          var pd = tb_village.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to edit");
          } else {
            edit_village(pd);
          }
        },
      },
      {
        text: "Delete Row",
        titleAttr: "Delete Row",
        action: function () {
          var pd = tb_village.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to delete");
          } else {
            delete_village(pd.id_lv2);
          }
        },
      },
    ],
  });
  tb_variety = $("#tb_variety").DataTable({
    autoWidth: true,
    pageLength: 5,
    dom: '<"top"fB>rt<"bottom"lip><"clear">',
    ajax: {
      method: "GET",
      url: "get/variety",
      dataSrc: "",
    },
    columns: [{ data: "name_variety" }, { data: "Crop_name" }],
    select: true,
    buttons: [
      {
        text: "Edit Row",
        titleAttr: "Edit Row",
        action: function () {
          var pd = tb_variety.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to edit");
          } else {
            edit_variety(pd);
          }
        },
      },
      {
        text: "Delete Row",
        titleAttr: "Delete Row",
        action: function () {
          var pd = tb_variety.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to delete");
          } else {
            delete_variety(pd.id_variety);
          }
        },
      },
    ],
  });
  tb_comp = $("#tb_comple").DataTable({
    autoWidth: true,
    pageLength: 5,
    dom: '<"top"fB>rt<"bottom"lip><"clear">',
    ajax: {
      method: "GET",
      url: "get/district",
      dataSrc: "",
    },
    columns: [{ data: "name_lv3" }],
    select: true,
    buttons: [
      {
        text: "Edit Row",
        titleAttr: "Edit Row",
        action: function () {
          var pd = tb_comp.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to edit");
          } else {
            edit_complementary(pd);
          }
        },
      },
      {
        text: "Delete Row",
        titleAttr: "Delete Row",
        action: function () {
          var pd = tb_village.row({ selected: true }).data();
          if (pd == null) {
            alert("Please select a row to delete");
          } else {
            delete_village(pd.id_lv2);
          }
        },
      },
    ],
  });
});
$("#tb_crop").on("click", "tbody tr", function () {
  tb_crop.row(this).edit();
});
// Plant Doctor Functions
function edit_pdoctor(pd) {
  $("#modal_pdoctor").modal("show");
  $("#form_pdoctor_edit input[name='id_plant_doc']").val(pd.id_plant_doc);
  $("#form_pdoctor_edit input[name='pdoc_name']").val(pd.pdoc_name);
  $("#form_pdoctor_edit input[name='pdoc_lastname']").val(pd.pdoc_lastname);
  $("#form_pdoctor_edit input[name='pdoc_phone']").val(pd.pdoc_phone);
  $("#form_pdoctor_edit input[name='pdoc_email']").val(pd.pdoc_email);
  $("#form_pdoctor_edit input[name='pdoc_ocupation']").val(pd.pdoc_ocupation);
  $("#form_pdoctor_edit input[name='pdoc_type_entity']").val(
    pd.pdoc_type_entity
  );
}
function delete_pdoctor(id_plant_doc) {
  var conf = confirm("Are you sure you want to delete the row?");
  if (conf == true) {
    $.ajax({
      method: "POST",
      url: "delete/pdoctor",
      data: { id_plant_doc: id_plant_doc },
      headers: { "X-Requested-With": "XMLHttpRequest" },
      dataType: "json",
      success: function (result) {
        var r = JSON.parse(result);
        if (r == "1") {
          alert("Plant doctor was deleted");
          tb_pd.ajax.reload();
        }
      },
    });
  }
}
$("#form_pdoctor_reg").submit(function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "insert/pdoctor",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);
      if (r == "1") {
        alert("Plant doctor was successfully inserted");
        tb_pd.ajax.reload();
        cleanInput("form_pdoctor_reg");
      }
    },
  });
});
$("#form_pdoctor_edit").submit(function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "update/pdoctor",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);
      if (r == "1") {
        alert("Plant doctor was successfully updated");
        $("#modal_pdoctor").modal("hide");
        tb_pd.ajax.reload();
        // cleanInput("form_pdoctor_reg");
      }
    },
  });
});
// /////////////////////////////////////
// Crop Functions
$("#form_cropadmin_reg").submit(function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "insert/crop",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);

      if (r == "1") {
        alert("Crop was successfully inserted");
        cleanInput("form_cropadmin_reg");
        tb_crop.ajax.reload();
      }
    },
  });
});
function edit_crops(pd) {
  $("#modal_crop").modal("show");
  $("#form_crop_edit input[name='id_crop']").val(pd.id_crop);
  $("#form_crop_edit input[name='Crop_name']").val(pd.Crop_name);
  $("#form_crop_edit input[name='Local_crop_name']").val(pd.Local_crop_name);
}
$("#form_crop_edit").submit(function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "update/crop",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);
      if (r == "1") {
        alert("Crop was successfully updated");
        $("#modal_crop").modal("hide");
        tb_crop.ajax.reload();
        // cleanInput("form_pdoctor_reg");
      }
    },
  });
});
function delete_crop(id_crop) {
  var conf = confirm("Are you sure you want to delete the row?");
  if (conf == true) {
    $.ajax({
      method: "POST",
      url: "delete/crop",
      data: { id_crop: id_crop },
      headers: { "X-Requested-With": "XMLHttpRequest" },
      dataType: "json",
      success: function (result) {
        var r = JSON.parse(result);
        if (r == "1") {
          alert("Crop was deleted");
          tb_crop.ajax.reload();
        }
      },
    });
  }
}
// /////////////////////////////////
// Parish Functions
$("#form_parish_reg").submit(function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "insert/parish",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);

      if (r == "1") {
        alert("Parish was successfully inserted");
        get_crops();
        cleanInput("form_parish_reg");
        tb_parish.ajax.reload();
      }
    },
  });
});
function edit_parish(pd) {
  $("#modal_parish").modal("show");
  $("#form_parish_edit input[name='id_lv1']").val(pd.id_lv1);
  $("#form_parish_edit input[name='name_lv1']").val(pd.name_lv1);
}
$("#form_parish_edit").submit(function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "update/parish",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);
      if (r == "1") {
        alert("Parish was successfully updated");
        $("#modal_parish").modal("hide");
        tb_parish.ajax.reload();
        // cleanInput("form_pdoctor_reg");
      }
    },
  });
});
function delete_parish(id_lv1) {
  var conf = confirm("Are you sure you want to delete the row?");
  if (conf == true) {
    $.ajax({
      method: "POST",
      url: "delete/parish",
      data: { id_lv1: id_lv1 },
      headers: { "X-Requested-With": "XMLHttpRequest" },
      dataType: "json",
      success: function (result) {
        var r = JSON.parse(result);
        if (r == "1") {
          alert("Parish was deleted");
          tb_parish.ajax.reload();
        }
      },
    });
  }
}
// ////////////////////////////
// Village Functions
$("#form_village_reg").submit(function (event) {
  event.preventDefault();
  console.log("submit test");
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "insert/village",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);

      if (r == "1") {
        alert("Village was successfully inserted");
        cleanInput("form_village_reg");
        tb_village.ajax.reload();
      }
    },
  });
});
function edit_village(pd) {
  $("#modal_village").modal("show");
  $("#form_village_edit input[name='id_lv2']").val(pd.id_lv2);
  $("#form_village_edit input[name='name_lv2']").val(pd.name_lv2);
  $("#form_village_edit select[name='id_lv1']").val(pd.id_lv1);
}
$("#form_village_edit").submit(function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "update/village",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);
      if (r == "1") {
        alert("Village was successfully updated");
        $("#modal_village").modal("hide");
        tb_village.ajax.reload();
        // cleanInput("form_pdoctor_reg");
      }
    },
  });
});
function delete_village(id_lv2) {
  var conf = confirm("Are you sure you want to delete the row?");
  if (conf == true) {
    $.ajax({
      method: "POST",
      url: "delete/village",
      data: { id_lv2: id_lv2 },
      headers: { "X-Requested-With": "XMLHttpRequest" },
      dataType: "json",
      success: function (result) {
        var r = JSON.parse(result);
        if (r == "1") {
          alert("Village was deleted");
          tb_village.ajax.reload();
        }
      },
    });
  }
}
// ///////////////////////////////
// Complementary address functions
$("#form_compleAdmin_reg").submit(function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "insert/complementary",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);
      if (r == "1") {
        alert("Complementary adress was successfully inserted");
        tb_comp.ajax.reload();
        cleanInput("form_compleAdmin_reg");
      }
    },
  });
});
function edit_complementary(pd) {
  $("#modal_com").modal("show");
  $("#form_comp_edit input[name='id_lv3']").val(pd.id_lv3);
  $("#form_comp_edit input[name='name_lv3']").val(pd.name_lv3);
  $("#form_comp_edit select[name='id_lv2']").val(pd.id_lv2);
}
// //////////////////////////////////
// Variety functions
$("#form_Variety_reg").submit(function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "insert/variety",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);
      if (r == "1") {
        alert("Variety was successfully inserted");
        tb_variety.ajax.reload();
        cleanInput("form_Variety_reg");
      }
    },
  });
});
function edit_variety(pd) {
  $("#modal_var").modal("show");
  $("#form_var_edit input[name='id_variety']").val(pd.id_variety);
  $("#form_var_edit input[name='name_variety']").val(pd.name_variety);
  $("#form_var_edit select[name='id_crop']").val(pd.id_crop);
}
$("#form_var_edit").submit(function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: "update/variety",
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log(respuesta);
      var r = JSON.parse(respuesta);
      if (r == "1") {
        alert("Variety was successfully updated");
        $("#modal_var").modal("hide");
        tb_variety.ajax.reload();
        // cleanInput("form_pdoctor_reg");
      }
    },
  });
});
function delete_variety(id_variety) {
  var conf = confirm("Are you sure you want to delete the row?");
  if (conf == true) {
    $.ajax({
      method: "POST",
      url: "delete/variety",
      data: { id_variety: id_variety },
      headers: { "X-Requested-With": "XMLHttpRequest" },
      dataType: "json",
      success: function (result) {
        var r = JSON.parse(result);
        if (r == "1") {
          alert("Variety was deleted");
          tb_variety.ajax.reload();
        }
      },
    });
  }
}
// //////////////////////////////////

$("#switch_pd").on("click", function () {
  if ($("#switch_pd").is(":checked")) {
    $("#label_spd").html("Change to Register");

    $("#form_pdoctor_reg").addClass("d-none");
    $("#tb_pdoctor_sec").removeClass("d-none");
  } else {
    $("#label_spd").html("Change to View table");
    $("#tb_pdoctor_sec").addClass("d-none");
    $("#form_pdoctor_reg").removeClass("d-none");
  }
});
$("#switch_crop").on("click", function () {
  if ($("#switch_crop").is(":checked")) {
    $("#label_crop").html("Change to Register");

    $("#form_cropadmin_reg").addClass("d-none");
    $("#tb_crop_sec").removeClass("d-none");
  } else {
    $("#label_crop").html("Change to View table");
    $("#tb_crop_sec").addClass("d-none");
    $("#form_cropadmin_reg").removeClass("d-none");
  }
});
$("#switch_parish").on("click", function () {
  if ($("#switch_parish").is(":checked")) {
    $("#label_parish").html("Change to Register");

    $("#form_parish_reg").addClass("d-none");
    $("#tb_parish_sec").removeClass("d-none");
  } else {
    $("#label_parish").html("Change to View table");
    $("#tb_parish_sec").addClass("d-none");
    $("#form_parish_reg").removeClass("d-none");
  }
});
$("#switch_village").on("click", function () {
  if ($("#switch_village").is(":checked")) {
    $("#label_village").html("Change to Register");

    $("#form_village_reg").addClass("d-none");
    $("#tb_village_sec").removeClass("d-none");
  } else {
    $("#label_village").html("Change to View table");
    $("#tb_village_sec").addClass("d-none");
    $("#form_village_reg").removeClass("d-none");
  }
});
$("#switch_variety").on("click", function () {
  if ($("#switch_variety").is(":checked")) {
    $("#label_variety").html("Change to Register");

    $("#form_Variety_reg").addClass("d-none");
    $("#tb_variety_sec").removeClass("d-none");
  } else {
    $("#label_variety").html("Change to View table");
    $("#tb_variety_sec").addClass("d-none");
    $("#form_Variety_reg").removeClass("d-none");
  }
});
$("#switch_comp").on("click", function () {
  if ($("#switch_comp").is(":checked")) {
    $("#label_comp").html("Change to Register");

    $("#form_compleAdmin_reg").addClass("d-none");
    $("#tb_comp_sec").removeClass("d-none");
  } else {
    $("#label_comp").html("Change to View table");
    $("#tb_comp_sec").addClass("d-none");
    $("#form_compleAdmin_reg").removeClass("d-none");
  }
});
function get_forVariety() {
  $(".select_Variety_register").empty();
  $(".select_Variety_register").append(
    '<option value="0" readonly selected>Select Crop</option>'
  );
  // Get Variety
  $.ajax({
    method: "get",
    url: "get/crop",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    success: function (result) {
      crop = JSON.parse(result);

      // console.log(crop);
      for (const key in crop) {
        if (Object.hasOwnProperty.call(crop, key)) {
          const element = crop[key];

          $(".select_Variety_register").append(
            "<option value='" +
              element["id_crop"] +
              "'>" +
              element["Crop_name"] +
              "</option>"
          );
        }
      }
    },
  });
}
function get_crops() {
  $(".select_parish_register").empty();
  $(".select_parish_register").append(
    '<option value="0" readonly selected>Select parish</option>'
  );
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

          $(".select_parish_register").append(
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
function get_village() {
  $(".select_village_register").empty();
  $(".select_village_register").append(
    '<option value="0" readonly selected>Select parish</option>'
  );
  // Get county
  $.ajax({
    method: "get",
    url: "get/parish",
    headers: { "X-Requested-With": "XMLHttpRequest" },
    success: function (result) {
      county = JSON.parse(result);
      // console.log(county);

      for (const key in county) {
        if (Object.hasOwnProperty.call(county, key)) {
          const element = county[key];

          $(".select_village_register").append(
            "<option value='" +
              element["id_lv2"] +
              "'>" +
              element["name_lv2"] +
              "</option>"
          );
        }
      }
    },
  });
}
function cleanInput(formulario) {
  $("#" + formulario).each(function () {
    $(this).find("input").val("");
    $(this).find("select").val(0);
  });
  // document.getElementById(".select_village_register").selectedIndex = 0;
}
