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
            {

                text: 'Edit',
                titleAttr: "Edit User",
                action: function () {
                    var user = user_table.row({ selected: true }).data();
                    if (user == null) {
                        alert("Please Select a User to Edit");
                    }
                    else {
                        FillUserEditData(user);

                        $("#ModalEditUser").modal("show");
                    }


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
        ],
        columnDefs: [
            {
                targets: [4],
                data: 'type_user',
                render: function (data, type, row) {
                    if (data == 0) {
                        return "<span> Administrator </span>"
                    }
                    if (data == 1) {
                        return "<span> Supervisor </span>"
                    }
                    if (data == 2) {
                        return "<span> Technical User </span>"
                    }
                    if (data == 3) {
                        return "<span> Invited User </span>"
                    }


                }

            },
        ]
    });
});
function FillUserEditData(user) {
    console.log(user)
    $("#modal-name_user").val(user['name_user']);
    $("#modal-lastn_user").val(user['lastn_user']);
    $("#modal-email_user").val(user['email_user']);
    $("#modal-psw_user").val(user['psw_user']);
    $("#modal-phone_user").val(user['phone_user']);
    $("#modal-type_user").val(user['type_user']);
    $("#modal-id_user").val(user['id_user']);
}
$("#modal_EditUserForm").on("submit", function (event) {
    event.preventDefault();
    show_spin("saveChangesEditUser", "spin_e_user", "not_spin_e_user");
    var formData = new FormData($(this)[0]);
    console.log("submit");
    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            console.log(respuesta)
            // if (respuesta == 1) {
            //     $("#validation_user").html("That Email Already Exist");
            //     $("#validation_user").removeClass("d-none");
            // } else {
            user_table.ajax.reload();
            alert("The User Has Been Updated Succesfully");
            hide_spin("saveChangesEditUser", "spin_e_user", "not_spin_e_user");

            // }

            // console.log(r,'json');
        }
    })
})
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
$("#update_profile").submit(function (event) {
    event.preventDefault();
    var formData = new FormData($(this)[0]);
    show_spin("sub_updatePI", "spin_my_user", "not_spin_my_user");
    if ($("#imageUpload").val() == '') {
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

            // if (respuesta == 1) {
            //     $("#validation_user").html("That Email Already Exist");
            //     $("#validation_user").removeClass("d-none");
            // } else {
            user_table.ajax.reload();
            hide_spin("sub_updatePI", "spin_my_user", "not_spin_my_user");
            alert("The User Has Been Updated Succesfully");

        }

        // console.log(r,'json');

    })
});
// Register new User 
$("#register_user").submit(function (event) {
    event.preventDefault();

    if ($(this).attr('id') == 'register_user') {
        show_spin("sub_register_user", "spin_n_user", "not_spin_n_user");
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
