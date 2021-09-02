function add_cropdmg() {

    $('#tbody_crop_damage').append('<tr>' +
        '<td><input type="text" name="farmer_name_crd" placeholder="" class="form-control farmer_name_crd"></td>' +
        '<td><input type="date" name="visit_date_crd" placeholder="" class="form-control visit_date_crd"></td>' +
        '<td><input type="number" name="farmer_reg_crd" placeholder="" class="form-control farmer_reg_crd"></td>' +
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