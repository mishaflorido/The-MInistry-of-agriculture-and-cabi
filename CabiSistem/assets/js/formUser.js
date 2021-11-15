var user_table;
var contador = 0;
$(document).ready(function () {
    setInterval(function () {
        user_table.ajax.reload();
    }, 180000);

    user_table = $('#user_table').DataTable({
        stateSave: true,
        select: {
            style: 'single',
            blurable: true
        },
        stateSave: true,
        dom: 'Bfrtip',
        pagingType: "input",
        buttons: [
            {

                text: 'Delete',
                titleAttr: "Delete User",
                action: function () {
                    var farmer = user_table.row({ selected: true }).data();

                    delete_user(farmer);

                }
            },

        ],
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
        ]
    });
});
function delete_user(user) {
    if (confirm("Want to delete " + user['name_user'] + "?")) {
        $.ajax({
            url: "delete/user",
            type: "POST",
            data: {
                "id_user": user['id_user']
            },
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            dataType: 'json',
            success: function (respuesta) {






                // console.log(r,'json');
            }
        }).done(function () {

            alert("User " + user['name_user'] + " has been deleted ");
            user_table.ajax.reload();
        })
    }
}

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

$(".card-heading").hover(function () {
    contador += 1;

    var x = $(this).find('.load_img').data('xform');//ve de que formulario mostrar la imagen


    if ((contador % 2) == !0) {

        if (x == 0) {
            $('#update_p_form').css('display', 'inline-block');
            $('#aav_prev').css('display', 'inline-block');
        } else {
            $('#new_user_img').css('display', 'inline-block');
            $('#av_prev_nu').css('display', 'inline-block');

        }
    }
    else {
        if (x == 0) {
            $('#update_p_form').css('display', 'none');
            $('#aav_prev').css('display', 'none');
        } else {
            $('#new_user_img').css('display', 'none');
            $('#av_prev_nu').css('display', 'none');

        }

    }
})
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
        // show_spin("sub_register_user", "spin_n_user", "not_spin_n_user");
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        if ($("#imageUpload_new").val() == '') {
            formData.delete("img_user");
            formData.append("img_user", "");
            // console.log(formData.get("img_user"));
        }
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {


                if (respuesta == 1) {
                    $("#validation_user").html("That Email Already Exist");
                    $("#validation_user").removeClass("d-none");
                } else {
                    user_table.ajax.reload();
                    hide_spin("sub_register_user", "spin_n_user", "not_spin_n_user");
                    alert("The New User Has Been Registred Succesfully");
                    $('#alert_user_page').html("The New User Has Been Registred Succesfully");
                    $('#alert_user_page').removeClass('d-none');
                    $("#validation_user").addClass("d-none");
                    $("#validation_user").html("")
                }

                // console.log(r,'json');
            }
        })
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
