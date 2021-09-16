$(document).on("change", "#week_end", function () {
    var date_n = new Date($(this).val());
    var x_date = new Date($(this).val());

    var start_date = date_n.getUTCDate();

    $("#tbody_wkly_past_report tr").each(function () {
        x_date.setUTCDate(start_date + 1);
        $(this).children().find(".h_input").val(x_date);

        start_date += 1;

    })



})
$(document).on("change", "#week_beg", function () {
    var date_n = new Date($(this).val());
    var x_date = new Date($(this).val());

    var start_date = date_n.getUTCDate();


    $("#tbody_wkly_plan_report tr").each(function () {
        x_date.setUTCDate(start_date + 1);
        // console.log($(this).children().html());
        $(this).children().find(".h_input_b").val(x_date);

        start_date += 1;

    })
})
function add_other_act() {

    $('#tbody_other_ofActivities').append('<tr>' +
        '<td><input type="text" name="date_other_act" placeholder="Day, date & time" class="form-control date_other_act"></td>' +
        '<td><input type="text" name="nat_act" placeholder="Nature of activity" class="form-control nat_act"></td>' +
        '<td><input type="text" name="det_act" placeholder="Details" class="form-control det_act"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
$("form").submit(function (event) {

    if ($(this).attr('class') == 'frm_ofwr') {
        event.preventDefault();
        show_spin("ofiwr_btn_submit", "spin_ofwr", "not_spin_ofwr");

        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "insert/oficer_wr",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {


                var r = JSON.parse(respuesta);
                setTimeout(function () {
                    insert_week_report(r);
                }, 1000);
                setTimeout(function () {
                    insert_other_activ(r);

                }, 1000);
                setTimeout(function () {
                    insert_itinerary_week(r);

                }, 1000);
                // setTimeout(function () {
                //     future_development(r);

                // }, 1000);


            }
        }).done(function () {
            hide_spin("ofiwr_btn_submit", "spin_ofwr", "not_spin_ofwr");
            $('#alert_ofwr').html("The Oficers Itinerary Has Been Registred Succesfully");
            $('#alert_ofwr').removeClass('d-none');
        });
    }

})
function insert_itinerary_week(id_of_wr) {
    $("#tbody_wkly_plan_report tr").each(function () {
        var date_plan_rpt = $(this).find(".date_plan_rpt").val();
        var prp_act = $(this).find(".prp_act").val();
        var name_act = $(this).find(".name_act").val();
        var loc_prp = $(this).find(".loc_prp").val();
        var nat_prp = $(this).find(".nat_prp").val();

        $.ajax({
            url: "insert/itinerary_week",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'date_plan_rpt': date_plan_rpt,
                'prp_act': prp_act,
                'name_act': name_act,
                'loc_prp': loc_prp,
                'nat_prp': nat_prp,
                'id_of_wr': id_of_wr

            },
            success: function (respuesta) {

                console.log(respuesta);



            }
        });

    });

}
function insert_other_activ(id_of_wr) {
    $("#tbody_other_ofActivities tr").each(function () {
        var date_other_act = $(this).find(".date_other_act").val();
        var nat_act = $(this).find(".nat_act").val();
        var det_act = $(this).find(".det_act").val();
        $.ajax({
            url: "insert/other_activ",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'date_other_act': date_other_act,
                'nat_act': nat_act,
                'det_act': det_act,
                'id_of_wr': id_of_wr
            },
            success: function (respuesta) {

                console.log(respuesta);



            }
        });

    })
}
function insert_week_report(id_of_wr) {
    $("#tbody_wkly_past_report tr").each(function () {
        var date_rpt_day = $(this).find(".date_rpt_day").val();
        var name_wkly_rpt = $(this).find(".name_wkly_rpt").val();
        var date_wkly_rpt = $(this).find(".date_wkly_rpt").val();
        var clt_wkly_rpt = $(this).find(".clt_wkly_rpt").val();
        var Adv_wkly_rpt = $(this).find(".Adv_wkly_rpt").val();
        var time_wkly_rpt = $(this).find(".time_wkly_rpt").val();
        var miles_wkly_rpt = $(this).find(".miles_wkly_rpt").val();
        $.ajax({
            url: "insert/weekend_wr",
            type: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            data: {
                'date_rpt_day': date_rpt_day,
                'name_wkly_rpt': name_wkly_rpt,
                'date_wkly_rpt': date_wkly_rpt,
                'clt_wkly_rpt': clt_wkly_rpt,
                'Adv_wkly_rpt': Adv_wkly_rpt,
                'time_wkly_rpt': time_wkly_rpt,
                'miles_wkly_rpt': miles_wkly_rpt,
                'id_of_wr': id_of_wr

            },
            success: function (respuesta) {

                console.log(respuesta);



            }
        });

    });

}