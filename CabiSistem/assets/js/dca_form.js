var county;
var sub_county;
var village;
var variety;
$(document).ready(function () {
    // Get Varietys
    $.ajax({
        method: "get",
        url: "get/variety",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        success: function (result) {

            variety = JSON.parse(result);
        }
    });
    // Get Plant Doctor
    $.ajax({
        method: "get",
        url: "get/plant_doctor",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        success: function (result) {

            county = JSON.parse(result);

            for (const key in county) {
                if (Object.hasOwnProperty.call(county, key)) {
                    const element = county[key];

                    $('#plant_doctor_list').append("<option id='" + element['id_plant_doc'] + "' value='" + element['pdoc_name'] + element['pdoc_lastname'] + "'></option>");

                }
            }
        }
    });
    // Get county
    $.ajax({
        method: "get",
        url: "get/county",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        success: function (result) {

            county = JSON.parse(result);

            for (const key in county) {
                if (Object.hasOwnProperty.call(county, key)) {
                    const element = county[key];

                    $('#county_list_id').append("<option value='" + element['id_lv1'] + "'>" + element['name_lv1'] + "</option>");

                }
            }
        }
    });
    // Get sub-county
    $.ajax({
        method: "get",
        url: "get/parish",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        success: function (result) {

            // console.log(result);
            sub_county = JSON.parse(result);


        }
    });
    // //////////////////
    // Get village
    $.ajax({
        method: "get",
        url: "get/district",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        success: function (result) {

            village = JSON.parse(result);
            // console.log(district);
        }
    });
    // //////////////////


    // Get Crop
    $.ajax({
        method: "GET",
        url: "get/crop",
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (result) {
            // console.log(result);


            for (const key in result) {
                if (result.hasOwnProperty.call(result, key)) {
                    const element = result[key];
                    $("#crop_dca").append("<option class='" + element['Crop_name'] + "' id='" + element['id_crop'] + "' value='" + element['Crop_name'] + "'></option>");

                }
            }

        }

    });
})
$("#county_list_id").on('change', function () {

    $("#sub_county_list_id").empty();
    $("#sub_county_list_id").append("<option selected disabled>Sub County Select (First Select County)</option>");
    for (const key in sub_county) {
        if (Object.hasOwnProperty.call(sub_county, key)) {
            const element = sub_county[key];

            if (element['id_lv1'] == $(this).val())
                $('#sub_county_list_id').append("<option class='sub_county' value='" + element['id_lv2'] + "'>" + element['name_lv2'] + "</option>");

        }
    }
});
$("#sub_county_list_id").on('change', function () {


    $("#village_id").empty();
    $("#village_id").append("<option selected disabled>Village Select (First Select Sub County)</option>");
    for (const key in village) {
        if (Object.hasOwnProperty.call(village, key)) {
            const element = village[key];

            if (element['id_lv2'] == $(this).val())
                $('#village_id').append("<option value='" + element['id_lv3'] + "'>" + element['name_lv3'] + "</option>");

        }
    }
});
$("#sub_county_list_id").on('change', function () {


    $("#village_id").empty();
    $("#village_id").append("<option selected disabled>Village Select (First Select Sub County)</option>");
    for (const key in village) {
        if (Object.hasOwnProperty.call(village, key)) {
            const element = village[key];

            if (element['id_lv2'] == $(this).val())
                $('#village_id').append("<option value='" + element['id_lv3'] + "'>" + element['name_lv3'] + "</option>");

        }
    }
});
$("#crop_dca_list").on("change", function () {
    console.log("valor" + $(this).val());
    var id_crop = get_id_crop($(this).val(), "crop_dca");
    for (const key in variety) {
        if (Object.hasOwnProperty.call(variety, key)) {
            const element = variety[key];
            if (element['id_crop'] == id_crop) {
                $("#list_dca_variety").append("<option class='" + element['name_variety'] + "' id='" + element['id_variety'] + "' value='" + element['name_variety'] + "'></option>")
            }

        }
    }

});