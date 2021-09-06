var user_table;
$(document).ready(function () {

    user_table = $('#user_table').DataTable({
        stateSave: true,
        ajax: {
            method: "GET",
            url: "get/users",
            dataSrc: ""

        },
        columns: [

            { data: 'name_user' },
            { data: 'lastn_user' },
            { data: 'email_user' },
            { data: 'phone_user' },
            { data: 'type_user' }
            // { data: 'estado' },
            // {
            //     ordenable: true,
            //     render: function (data, type, row) {
            //         return "<button type='button' class='btn btn-danger dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
            //             "<span class='sr - only'>Menu</span> </button >" +
            //             "<div class='dropdown-menu'>" +
            //             "<a class='dropdown-item' href='#' OnClick=\"ver_personal(" + row.id_per + ",'" + row.nom_per + "','" + row.ciudad + "','" + row.unidad_per + "','" + row.telf_per + "','" + row.app_per + "','" + row.apm_per + "','" + row.ci_per + "','" + row.id_cat_per + "','" + row.id_cargo_per + "','" + row.email_per + "','" + row.fec_ingreso_personal + "','" + row.cost_per + "','" + row.img_per + "')\">Ver Informacion</a>" +
            //             "<a class='dropdown-item' href='#' onClick=\"modificar_personal(" + row.id_per + ",'" + row.nom_per + "','" + row.ciudad + "','" + row.unidad_per + "','" + row.telf_per + "','" + row.app_per + "','" + row.apm_per + "','" + row.ci_per + "','" + row.id_cat_per + "','" + row.id_cargo_per + "','" + row.email_per + "','" + row.fec_ingreso_personal + "','" + row.cost_per + "','" + row.img_per + "')\">Editar Información</a>" +
            //             "<a class='dropdown-item' href='#' onClick=\"cambiar_estado(" + row.id_per + ",'" + row.estado + "')\">Cambiar de estado</a>" +
            //             "<div class='dropdown-divider'></div>" +
            //             "<a id='btn_eliminar_personalf' name='btn_eliminar_personalf' class='dropdown-item fa fa-trash-o' href='#' onClick=\"eliminar_personalFijo( " + row.id_per + ",'" + row.nom_per + "', '" + row.nom_cargo + "', '" + row.ciudad + "')\" >Eliminar Personal</a></div></div > "

            //     }
            // },
        ]
    });
});

function readURL(input, elemento) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {


            if (elemento == 0) {

                $('#imagePreview_avatar').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview_avatar').hide();
                $('#imagePreview_avatar').fadeIn(650);
            }
            else if (elemento == 1) {
                $('#imagePreview_new').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview_new').hide();
                $('#imagePreview_new').fadeIn(650);
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(".load_img").change(function () {
    readURL(this, $(this).data('xform'));
    // console.log($(this).data('xform'));
});

$('.card-heading').mouseenter(function () {
    var x = $(this).find('.load_img').data('xform');//si es de un formulario mostrar la imagen
    if (x == 0) {
        $("#update_p_form").css({
            "display": " inline-block",
            "transition": "display 1.7s"

        });
    }
    else {
        $("#new_user_img").css({
            "display": " inline-block",
            "transition": "display 1.7s"

        });
    }

})

$('.card-body').mouseenter(function () {
    $(".avatar-upload").css({
        "display": "none",
        "transition": "display 0.7s"

    })
})
$('.main-sidebar').mouseenter(function () {
    $(".avatar-upload").css({
        "display": "none",
        "transition": "display 0.7s"

    })
});
$('.col-lg-12').mouseenter(function () {
    $(".avatar-upload").css({
        "display": "none",
        "transition": "display 0.7s"

    })
});
$("#update_profile_check").on("change", function () {
    // console.log($(this).prop);
    if ($(this).prop('checked') == true) {

        $('.pi_input').prop("disabled", false);
        $('#sub_updatePI').removeClass('d-none');
    }
    else {
        $('.pi_input').prop("disabled", true);
        $('#sub_updatePI').addClass('d-none');
    }
});
// Update This Profile
$("#sub_updatePI").on("submit", function (event) {
    event.preventDefault();
    var formData = new FormData($(this)[0]);


});
// Register new User 
$("form").submit(function (event) {

    if ($(this).attr('id') == 'register_user') {
        show_spin("sub_register_user", "spin_n_user", "not_spin_n_user");
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {


                var r = JSON.parse(respuesta);
                // console.log(r,'json');
            }
        }).done(function () {
            user_table.ajax.reload();
            hide_spin("sub_register_user", "spin_n_user", "not_spin_n_user");
            $('#alert_user_page').html("The New User Has Been Registred Succesfully");
            $('#alert_user_page').removeClass('d-none');

        });
    }



});
function show_spin(button, spin, not_spin) {
    $("." + spin).removeClass("d-none");
    $("." + not_spin).addClass("d-none");
    $("#" + button).attr("disabled", "disabled")
}
function hide_spin(button, spin, not_spin) {
    $("." + not_spin).removeClass("d-none");
    $("." + spin).addClass("d-none");
    $("#" + button).attr("disabled", false);
}
