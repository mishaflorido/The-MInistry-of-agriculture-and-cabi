function add_road() {
    console.log("estoy aqui y hago esto 2");
    $('#tbody_farm_road').append('<tr>' +
        '<td><input type="text" name="road_dist" placeholder="" class="form-control road_dist"></td>' +
        '<td><input type="text" name="road_name" placeholder="" class="form-control road_name"></td>' +
        '<td><input type="number" name="road_length" placeholder="" class="form-control road_length"></td>' +
        '<td><input type="number" name="num_farm" placeholder="" class="form-control num_farm"></td>' +
        '<td><input type="text" name="agr_act" placeholder="" class="form-control agr_act"></td>' +
        '<td><input type="text" name="work" placeholder="" class="form-control work"></td>' +
        '<td><input type="text" name="remark" placeholder="" class="form-control remark"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
$("#submit_farm_road").on("click", function () {
    show_spin("submit_farm_road", "spin_farm_road", "not_spin_farm_road");

    $("#tbody_farm_road tr").each(function () {
        var road_dist = $(this).find(".road_dist").val();
        var road_name = $(this).find(".road_name").val();
        var road_length = $(this).find(".road_length").val();
        var num_farm = $(this).find(".num_farm").val();
        var agr_act = $(this).find(".agr_act").val();
        var work = $(this).find(".work").val();
        var remark = $(this).find(".remark").val();

        $.ajax({
            url: "insert/farmRoad",
            type: "POST",
            data: {
                'road_dist': road_dist,
                'road_name': road_name,
                'road_length': road_length,
                'num_farm': num_farm,
                'agr_act': agr_act,
                'work': work,
                'remark': remark
            },
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            success: function (respuesta) {

                var r = JSON.parse(respuesta);



            }
        });
    })
    hide_spin("submit_farm_road", "spin_farm_road", "not_spin_farm_road");
    $('#alert_farm_roads').html("The Farm Roads Has Been Registred Succesfully");
    $('#alert_farm_roads').removeClass('d-none');
    // }

})
