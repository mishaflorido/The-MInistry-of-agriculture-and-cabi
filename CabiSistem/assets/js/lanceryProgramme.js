function fillEmptyInputDataCEPI() {

    $(".praedial_lancery input[type='text']").val('');
    $(".praedial_lancery input[type='hidden']").val('');
    $("#tbody_produce").empty();
    $("#tbody_produce").append(`
    <tr>
        <td><input type="text" name="crop_name" placeholder="" style="width: auto" class="form-control crop_name"></td>
        <td><input type="number" name="plot_size" placeholder="" class="form-control plot_size"></td>
        <td><input type="number" name="n_stools" placeholder="" class="form-control n_stools"></td>
        <td><input type="date" name="date_planted" placeholder="" class="form-control date_planted"></td>
        <td><input type="text" name="variety" placeholder="" style="width: auto" class="form-control variety"></td>
        <td><input type="text" name="stage_maturity" placeholder="" style="width: auto" class="form-control stage_maturity"></td>
        <td> <input type="date" name="harvest_date" placeholder="" class="form-control  harvest_date"> </td>
        <td><input type="text" name="yield" placeholder="" style="width: auto" class="form-control yield"></td>
        <td><input type="text" name="activities_carried" style="width: auto" placeholder="" class="form-control activities_carried"></td>
        <td><input type="text" name="taq_arf_moa" style="width: auto" placeholder="" class="form-control taq_arf_moa"></td>
        <td><input type="number" name="n_farm_visits" placeholder="" class="form-control n_farm_visits"></td>
        <td><input type="text" name="remarks" placeholder="" style="width: auto" class="form-control remarks"></td>
         <td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>
    </tr>
    `);

}

function add_praedial() {
    console.log("estoy aqui y hago esto");
    $('#tbody_produce').append('<tr>' +
        '<td><input type="text" name="crop_name" placeholder="" class="form-control crop_name"></td>' +
        '<td><input type="number" name="plot_size" placeholder="" class="form-control plot_size"></td>' +
        '<td><input type="number" name="n_stools" placeholder="" class="form-control n_stools"></td>' +
        '<td><input type="date" name="date_planted" placeholder=""  class="form-control date_planted"></td>' +
        '<td><input type="text" name="variety" placeholder="" class="form-control variety"></td>' +
        '<td><input type="text" name="stage_maturity" placeholder="" class="form-control stage_maturity"></td>' +
        '<td> <input type="date" name="harvest_date" placeholder="" class="form-control  harvest_date"> </td>' +
        '<td><input type="text" name="yield" placeholder="" class="form-control yield"></td>' +
        '<td><input type="text" name="activities_carried" placeholder="" class="form-control activities_carried"></td>' +
        '<td><input type="text" name="taq_arf_moa" placeholder="" class="form-control taq_arf_moa"></td>' +
        '<td><input type="number" name="n_farm_visits" placeholder="" class="form-control n_farm_visits"></td>' +
        '<td><input type="text" name="remarks" placeholder="" class="form-control remarks"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
$("form").submit(function (event) {

    if ($(this).attr('class') == 'praedial_lancery') {
        show_spin("lancery_btn_submit", "spin_lancery", "not_spin_lancery");
        // $(".spin").removeClass("d-none");
        // $(".not_spin").addClass("d-none");
        // $("#submit_form_farmer").attr("disabled", "disabled")
        event.preventDefault();
        var url_variable
        var formData = new FormData($(this)[0]);

        if ($("input[name='id_praedial']").val() != '') {
            url_variable = "update/praedial";
        }
        else {
            url_variable = "insert/praedial";
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


            }
        }).done(function () {
            cropest_table.ajax.reload();
            setTimeout(function () {
                fillEmptyInputDataCEPI();
                hide_spin("lancery_btn_submit", "spin_lancery", "not_spin_lancery");
                $('#alert_lancery_programme').html("The register has been saved succesfully");
                $('#alert_lancery_programme').removeClass('d-none');

            }, 1000);
        });
    }

})
function insert_weekly_data_collection(id_praedial) {
    var url_weekly;
    if ($("input[name='id_praedial']").val() != '') {

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
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                dataType: 'json',
                data: {
                    'id_wdc': id_wdc,
                    'crop_name': crop_name,
                    'plot_size': plot_size,
                    'n_stools': n_stools,
                    'date_planted': date_planted,
                    'variety': variety,
                    'stage_maturity': stage_maturity,
                    'harvest_date': harvest_date,
                    'yield': yield,
                    'activities_carried': activities_carried,
                    'taq_arf_moa': taq_arf_moa,
                    'n_farm_visits': n_farm_visits,
                    'remarks': remarks,
                    'id_praedial': id_praedial

                },
                success: function (respuesta) {

                    console.log(respuesta);



                }
            });

        });
    }
    else {
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
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                dataType: 'json',
                data: {
                    'crop_name': crop_name,
                    'plot_size': plot_size,
                    'n_stools': n_stools,
                    'date_planted': date_planted,
                    'variety': variety,
                    'stage_maturity': stage_maturity,
                    'harvest_date': harvest_date,
                    'yield': yield,
                    'activities_carried': activities_carried,
                    'taq_arf_moa': taq_arf_moa,
                    'n_farm_visits': n_farm_visits,
                    'remarks': remarks,
                    'id_praedial': id_praedial

                },
                success: function (respuesta) {

                    console.log(respuesta);



                }
            });

        });
    }

}