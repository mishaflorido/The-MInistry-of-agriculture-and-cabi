<?php
$session = \Config\Services::session();
$id = $session->get('id_user');
$photo = $session->get('img_user');
if ($type_user == 0) {
    $size = "col-lg-6";
} else {
    $size = "col-lg-12";
}
?>

<!-- /.content-header -->
<div class="row">
    <div class="offset-lg-1 col-lg-10">
        <!-- Alert -->
        <div class="alert alert-success d-none" role="alert" id="alert_user_page">

        </div>
        <!-- ///////// -->
    </div>
</div>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- User Profile Information -->
            <div class="<?= $size ?>">
                <div class="wrapper wrapper--w780">
                    <div class="card card-3">
                        <div id="imagePreview" class="card-heading my_user" style="background-color: #373c42;">
                            <form autocomplete="off" role="form" method="POST" id="update_profile" action="update/user" class="userform">
                                <div class="avatar-edit">
                                    <input disabled class="pi_input load_img" name='img_user' data-xform='0' type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"><i class="fas fa-pencil-alt" style="position: absolute; left:30%; top:26%;"></i></label>
                                </div>
                                <div class="avatar-upload" id="update_p_form">
                                    <div class="avatar-preview" id="aav_prev">
                                        <?php if ($photo != "") { ?>
                                            <div id="imagePreview_avatar" style="background-image: url('<?= base_url(); ?>/assets/img/user_img/<?= $photo ?>');">
                                            <?php } else { ?>
                                                <div id="imagePreview_avatar" style="background-image: url('<?= base_url(); ?>/assets/img/user_img/blank-profile-picture-973460.svg');">
                                                <?php }  ?>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="card-body" style="z-index: 2;">
                                    <h2 class="title">Your Profile Info</h2>
                                    <div class="input-group">
                                        <input disabled class="input--style-3 pi_input" type="text" placeholder="Name" name="name_user" value="<?php echo $username ?>" required>
                                        <input type="hidden" name="id_user" value="<?= $id ?>">
                                    </div>
                                    <div class="input-group">
                                        <input disabled class="input--style-3 pi_input" type="text" placeholder="Last Name" name="lastn_user" value="<?php echo $lastn_user ?>" required>
                                    </div>
                                    <!-- <div class="input-group">
                                     <input class="input--style-3 js-datepicker" type="date" placeholder="Birthdate" name="birthday" value="" required>
                                 </div> -->
                                    <div class="input-group">

                                        <select class="form-control form-select-user  pi_input" id="profile_select" name="type_user" selected='<?php echo $type_user ?>' disabled>
                                            <?php if ($type_user == 0) { ?>
                                                <option selected="selected" value='0'>Administrator</option>
                                            <?php } ?>
                                            <option value="1">Supervisor</option>
                                            <option value="2">Technical User</option>
                                            <option value="3">Invited User</option>
                                        </select>
                                        <div class="select-dropdown"></div>

                                    </div>
                                    <div class="input-group">
                                        <input disabled class="input--style-3 pi_input" type="email" placeholder="Email" name="email_user" value="<?php echo $email ?>">
                                    </div>
                                    <div class="input-group">
                                        <input disabled class="input--style-3 pi_input" type="text" placeholder="Phone" name="phone_user" autocomplete="off" value="<?php echo $phone ?>">
                                    </div>
                                    <div class="input-group">
                                        <input disabled class="input--style-3 pi_input" type="text" placeholder="Password" name="psw_user" autocomplete="off" value="<?php echo $psw_user ?>">
                                    </div>


                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="checkbox" id="update_profile_check">
                                        <label class="form-check-label" for="flexCheckDefault" style="color: #ccc">
                                            Update Profile Information?
                                        </label>
                                    </div>
                                    <div class="row p-t-10">
                                        <button class="btn btn--pill btn--green d-none" id="sub_updatePI" type="submit">
                                            <span class="spinner-border spinner-border-sm d-none spin_my_user" role="status" aria-hidden="true"></span>
                                            <span class="d-none spin_my_user">Loading...<br></span>
                                            <span class="d-none spin_my_user"> Please Wait</span>
                                            <span class="not_spin_my_user"> Update User</span></button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /////////////////// -->

            <?php if ($type_user == 0) { ?>
                <!-- Register New User -->
                <div class="col-lg-6">
                    <div class="wrapper wrapper--w780">
                        <div class="card card-3">
                            <div id="imagePreview_new_user" class="card-heading" style="background-color: #373c42;">
                                <form autocomplete="off" method="POST" id="register_user" action="insert/user">
                                    <div class="avatar-edit">
                                        <input class="load_img" type='file' name='img_user' data-xform='1' id="imageUpload_new" accept=".png, .jpg, .jpeg" nctype="multipart/form-data" />
                                        <label for="imageUpload_new"><i class="fas fa-pencil-alt" style="position: absolute; left:30%; top:26%;"></i></label>
                                    </div>
                                    <div class="avatar-upload" id='new_user_img'>
                                        <div class="avatar-preview" id="av_prev_nu">
                                            <div id="imagePreview_new" style="background-image: url('<?= base_url(); ?>/assets/img/blank-profile-picture-973460.svg');">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body" style="z-index: 2; width:100%">

                                <h2 class="title">Register New User</h2>
                                <div class="input-group">
                                    <input class="input--style-3 " type="text" placeholder="Name" name="name_user" value="" required>
                                    <input type="hidden" name="id_user" value="<?= $id ?>">
                                </div>
                                <div class="input-group">
                                    <input class="input--style-3 " type="text" placeholder="Last Name" name="lastn_user" value="" required>
                                </div>

                                <div class="input-group">

                                    <select class="form-control form-select-user" name="type_user" required>
                                        <option selected="selected" value="1">Supervisor</option>
                                        <option value="2">Technical User </option>
                                        <option value="3">Invited User</option>
                                    </select>
                                    <div class="select-dropdown"></div>

                                </div>
                                <div class="input-group">
                                    <input class="input--style-3 " type="email" placeholder="Email" name="email" value="" required>
                                </div>
                                <div class="input-group">
                                    <input class="input--style-3 " type="text" placeholder="Phone" name="phone" autocomplete="off" value="" required>
                                </div>
                                <div class="input-group">
                                    <input class="input--style-3 " type="text" placeholder="Password" name="password" autocomplete="off" value="" required>
                                </div>
                                <div class="row">
                                    <div class="alert alert-warning d-none" role="alert" id="validation_user">

                                    </div>
                                </div>
                                <div class="row p-t-10">
                                    <button class="btn btn--pill btn--green" id="sub_register_user" type="submit">
                                        <span class="spinner-border spinner-border-sm d-none spin_n_user" role="status" aria-hidden="true"></span>
                                        <span class="d-none spin_n_user">Loading...<br></span>
                                        <span class="d-none spin_n_user"> Please Wait</span>
                                        <span class="not_spin_n_user"> Register User</span>
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /////////////////// -->
            <?php } ?>


        </div>
        <!-- /.row -->
        <hr>
        <?php if ($type_user == 0 || $type_user == 1) { ?>
            <!-- Data Table User -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">View Users Registred</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <table id="user_table" class="display responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type User</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type User</th>
                    </tr>
                </tfoot>
            </table>
            <!-- /////////// -->
        <?php } ?>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- Modal -->
<div class="modal fade" id="ModalEditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="modal_EditUserForm" action="update/userInfo" method="POST">
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-md-3 mt-2">
                            <label>Name : </label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" type="hidden" name='id_user' id='modal-id_user'>
                            <input class="form-control" type="text" name='name_user' id='modal-name_user'>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-3 mt-2">
                            <label>Last Name : </label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name='lastn_user' id='modal-lastn_user'>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-3 mt-2">
                            <label>Email : </label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" type="email" name='email_user' id='modal-email_user'>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-3 mt-2">
                            <label>Password : </label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name='psw_user' id='modal-psw_user'>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-3 mt-2">
                            <label>Phone : </label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name='phone_user' id='modal-phone_user'>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-3 mt-2">
                            <label>Type User : </label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" aria-label="Default select example" name="type_user" id='modal-type_user'>
                                <option selected disabled>Select the type of user</option>
                                <option value="0">Admin</option>
                                <option value="1">Supervisor</option>
                                <option value="2">Technical</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <div class="row"> -->
                    <!-- <div class="col-md-1"> -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- </div> -->
                    <!-- <div class="offset-md-4 col-md-7"> -->
                    <button type="submit" class="btn btn-primary" id="saveChangesEditUser">
                        <span class="spinner-border spinner-border-sm d-none spin_e_user" role="status" aria-hidden="true"></span>
                        <span class="d-none spin_e_user">Loading...<br></span>
                        <span class="d-none spin_e_user"> Please Wait</span>
                        <span class="not_spin_e_user"> Save changes</span></button>
                    <!-- </div> -->
                    <!-- </div> -->
                </div>
            </form>
        </div>
    </div>
</div>