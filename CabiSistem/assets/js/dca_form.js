var county;
var sub_county;
var village;
var variety;
const coordinates = document.getElementById('coordinates');

$(document).ready(function () {
    mapboxgl.accessToken = 'pk.eyJ1IjoibWlndWVsZmxvcmlkbyIsImEiOiJja3VoZHRocHUyZGpkMm5vMzA5eWxwdHc5In0.U3l5KH2nMBy87fQBrQTMjg';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-61.68262052668253, 12.133375886867], // starting position [lng, lat],
        zoom: 10, // starting zoom
    });

    const marker = new mapboxgl.Marker({
        draggable: true
    }).setLngLat([-61.68262052668253, 12.133375886867]).addTo(map);
    function onDragEnd() {
        const lngLat = marker.getLngLat();
        coordinates.style.display = 'block';
        coordinates.innerHTML = `Longitude: ${lngLat.lng}<br />Latitude: ${lngLat.lat}`;
        $("input[name='coordinates_lat']").val(lngLat.lat);
        $("input[name='coordinates_lng']").val(lngLat.lng);
    }
    map.on('click', (e) => {
        console.log(e);
        marker.setLngLat([e.lngLat.lng, e.lngLat.lat]);
        onDragEnd();
    });
    $("#id_dca_form").change(function () {
        console.log("change input");
        onDragEnd();
    })
    marker.on('dragend', onDragEnd);
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

                    $('#plant_doctor_list').append("<option class='" + element['pdoc_name'] + element['pdoc_lastname'] + "' id='" + element['id_plant_doc'] + "' value='" + element['pdoc_name'] + element['pdoc_lastname'] + "'></option>");

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
    // console.log("valor" + $(this).val());
    var id_crop = get_id_crop($(this).val(), "crop_dca");
    $("#variety_dca").val('');
    $("#list_dca_variety").empty();
    for (const key in variety) {
        if (Object.hasOwnProperty.call(variety, key)) {
            const element = variety[key];
            if (element['id_crop'] == id_crop) {
                $("#list_dca_variety").append("<option class='" + element['name_variety'] + "' id='" + element['id_variety'] + "' value='" + element['name_variety'] + "'></option>")
            }

        }
    }

});
$("form").submit(function (event) {
    if ($(this).attr("id") == "dca_reg_form") {
        event.preventDefault();
        show_spin("btn_dca_form", "spin_dca", "not_spin_dca");
        var formData = new FormData($(this)[0]);
        var id_plant_doc = get_id_crop(formData.get("id_plant_doc"), "plant_doctor_list");
        var url_variable;
        var id_crop = get_id_crop(formData.get("id_crop"), "crop_dca");
        var id_vari = get_id_crop(formData.get("id_variety"), "list_dca_variety");
        var dev_stage = get_string_check("development_stage1", "development_stage2");
        var pp_afected = get_string_check("plant_afect1", "plant_afect2");
        var symtoms = get_string_check("symtoms_checkboxes1", "symtoms_checkboxes2");
        var sym_dist = get_string_check("sym_dist_checkboxes1", "sym_dist_checkboxes2");
        var rec_type = get_string_check("recomendationType_checkboxes1", "recomendationType_checkboxes2");
        if ($("input[name='id_dca_form']").val() != '') {
            url_variable = "update/dca_form";
        }
        else {
            url_variable = "insert/dca_form";
        }
        formData.delete("id_crop");
        formData.delete("id_variety");
        formData.delete("symtoms");
        formData.delete("sym_dist");
        formData.delete("rec_type");
        formData.delete("id_plant_doc");
        formData.append("symtoms", symtoms);
        formData.append("sym_dist", sym_dist);
        formData.append("rec_type", rec_type);
        formData.append("id_crop", id_crop);
        formData.append("id_variety", id_vari);
        formData.append("dev_stage", dev_stage);
        formData.append("pp_afected", pp_afected);
        formData.append("id_plant_doc", id_plant_doc);
        console.log(formData.get("prob_type_other"));
        console.log(formData.get("rec_type_other"));
        $.ajax({
            url: url_variable,
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

            }
        }).done(function () {
            reload_dca_table();
            hide_spin("btn_dca_form", "spin_dca", "not_spin_dca");
            $('.alert_dca').html("The New Farmer Has Been Registred Succesfully");
            $('.alert_dca').removeClass('d-none');
        });;


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

    return arr.toString();



}