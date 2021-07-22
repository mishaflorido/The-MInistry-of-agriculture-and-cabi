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
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="row">
    <div class="offset-lg-1 col-lg-10">
        <!-- Alert -->
        <div class="alert alert-info d-none" role="alert" id="alert_user_page">

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
                        <div id="imagePreview" class="card-heading" style="background-color: #373c42;">
                            <form autocomplete="off" role="form" method="POST" id="update_profile" action="update/user" class="userform">
                                <div class="avatar-edit">
                                    <input disabled class="pi_input load_img" data-xform='0' type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"><i class="fas fa-pencil-alt" style="position: absolute; left:30%; top:26%;"></i></label>
                                </div>
                                <div class="avatar-upload" style="display: none;" id="update_p_form">
                                    <div class="avatar-preview">
                                        <div id="imagePreview_avatar" style="background-image: url('<?= base_url(); ?>/assets/img/user_img/<?= $photo ?>');">
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
                                <input disabled class="input--style-3 pi_input" type="email" placeholder="Email" name="email" value="<?php echo $email ?>">
                            </div>
                            <div class="input-group">
                                <input disabled class="input--style-3 pi_input" type="text" placeholder="Phone" name="phone" autocomplete="off" value="<?php echo $phone ?>">
                            </div>


                            <div class="form-check mr-3">
                                <input class="form-check-input" type="checkbox" id="update_profile_check">
                                <label class="form-check-label" for="flexCheckDefault" style="color: #ccc">
                                    Update Profile Information?
                                </label>
                            </div>
                            <div class="row p-t-10">
                                <button class="btn btn--pill btn--green d-none" id="sub_updatePI" type="submit">Update</button>
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
                                        <input class="load_img" type='file' name='img_user' data-xform='1' id="imageUpload_new" accept=".png, .jpg, .jpeg" enctype="multipart/form-data" />
                                        <label for="imageUpload_new"><i class="fas fa-pencil-alt" style="position: absolute; left:30%; top:26%;"></i></label>
                                    </div>
                                    <div class="avatar-upload" style="display: none;" id='new_user_img'>
                                        <div class="avatar-preview">
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

                                    <select class="form-control form-select-user" name="type_user">
                                        <option selected="selected" value="1">Supervisor</option>
                                        <option value="2">Technical User </option>
                                        <option value="3">Invited User</option>
                                    </select>
                                    <div class="select-dropdown"></div>

                                </div>
                                <div class="input-group">
                                    <input class="input--style-3 " type="email" placeholder="Email" name="email" value="">
                                </div>
                                <div class="input-group">
                                    <input class="input--style-3 " type="text" placeholder="Phone" name="phone" autocomplete="off" value="">
                                </div>
                                <div class="input-group">
                                    <input class="input--style-3 " type="text" placeholder="Password" name="password" autocomplete="off" value="">
                                </div>

                                <div class="row p-t-10">
                                    <button class="btn btn--pill btn--green" id="sub_register_user" type="submit">Register User</button>
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
        <?php if($type_user==0 || $type_user==1){?>
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
        <table id="user_table" class="display" style="width:100%">
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
        <?php }?>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->