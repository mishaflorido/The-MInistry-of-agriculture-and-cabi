<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">Create or Edit auxiliar components Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#start_page" aria-expanded="false" aria-controls="start_page" style="padding-top: 0; padding-right:0">Home</a></li>
                    <li class="breadcrumb-item active">Create or Edit auxiliar components Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container">
    <div class="row">
        <div class="col-md-6 ">
            <div class="row border border-secondary border-3 rounded" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="m-2">Plant Doctor Register</h3>
                    </div>
                    <div class="offset-md-2 col-md-4 mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="switch_pd">
                            <label class="form-check-label mt-1" for="switch_pd" id="label_spd">
                                Change to View
                            </label>
                        </div>
                    </div>
                </div>

                <form id='form_pdoctor_reg' class="m-3">
                    <label class="form-label mt-3">Name: </label>
                    <input type="text" name="pdoc_name" class="form-control" placeholder="Plant doctor name" required>
                    <label class="form-label mt-3">Last Name: </label>
                    <input type="text" name="pdoc_lastname" class="form-control" placeholder="Plant doctor last name" required>
                    <label class="form-label mt-3">Phone: </label>
                    <input type="text" name="pdoc_phone" class="form-control" placeholder="Plant doctor Phone" required>
                    <label class="form-label mt-3">Email: </label>
                    <input type="email" name="pdoc_email" class="form-control" placeholder="Plant doctor email" required>
                    <label class="form-label mt-3">Ocupation: </label>
                    <input type="text" name="pdoc_ocupation" class="form-control" placeholder="Plant doctor ocupation">
                    <label class="form-label mt-3">Type of Entity: </label>
                    <input type="text" name="pdoc_type_entity" class="form-control" placeholder="Plant doctor entity">
                    <button class="btn btn-success my-3" type="submit">Submit</button>
                </form>
                <div id='tb_pdoctor_sec' style="width: 95% !important;" class="mx-3 my-3 table-responsive d-none">
                    <table id="tb_pdoctor" class="display " style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Ocupation</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_pdoctor">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Ocupation</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row mt-1 border border-secondary border-3 rounded" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="m-2">Crops Register</h3>
                    </div>
                    <div class="offset-md-1 col-md-5 mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="switch_crop">
                            <label class="form-check-label mt-1" for="switch_crop" id="label_crop">
                                Change to View
                            </label>
                        </div>
                    </div>

                </div>
                <form id='form_cropadmin_reg' class="my-3">
                    <label class="form-label mt-1">Crop Name: </label>
                    <input type="text" name="Crop_name" class="form-control" placeholder="Crop Name" required>
                    <label class="form-label mt-1">Local Crop Name: </label>
                    <input type="text" name="Local_crop_name" class="form-control" placeholder="Local Crop Name">
                    <button class="btn btn-success my-3 btn-sm" type="submit">Submit</button>
                </form>
                <div id='tb_crop_sec' style="width: 80% !important;" class="mx-3 my-3 table-responsive d-none">

                    <table id="tb_crop" class="display " style="width:100%">
                        <thead>
                            <tr>
                                <th>Crop Name</th>
                                <th>Local crop name</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_crop_edit">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Crop Name</th>
                                <th>Local crop name</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div class="row my-1 border border-secondary border-3 rounded" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="m-2">Variety Register</h3>
                    </div>
                    <div class="offset-md-1 col-md-5 mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="switch_variety">
                            <label class="form-check-label mt-1" for="switch_variety" id="label_variety">
                                Change to View
                            </label>
                        </div>
                    </div>
                </div>
                <form id='form_Variety_reg' class="my-3">
                    <label class="form-label mt-1">Select Crop: </label>
                    <select class="form-control select_Variety_register" name="id_crop" id="">
                        <option value="" readonly selected>Select Crop</option>
                    </select>
                    <label class="form-label mt-1">Variety Name: </label>
                    <input type="text" name="name_variety" class="form-control" placeholder="Variety name" required>
                    <button class="btn btn-success btn-sm my-3 " type="submit">Submit</button>
                </form>
                <div id='tb_variety_sec' style="width: 80% !important;" class="mx-3 my-3 d-none">
                    <table id="tb_variety" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Variety Name</th>
                                <th>Crop Name</th>


                            </tr>
                        </thead>
                        <tbody id="tbody_variety_edit">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Variety Name</th>
                                <th>Crop Name</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
        <div class="offset-md-1 col-md-5 ">

            <div class="row my-1 border border-secondary border-3 rounded" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="m-2">Parish Register</h3>
                    </div>
                    <div class="offset-md-1 col-md-5 mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="switch_parish">
                            <label class="form-check-label mt-1" for="switch_parish" id="label_parish">
                                Change to View
                            </label>
                        </div>
                    </div>
                </div>
                <form id='form_parish_reg' class="my-3">
                    <label class="form-label mt-1">Parish Name: </label>
                    <input type="text" name="name_lv1" class="form-control" placeholder="Parish Name" required>
                    <button class="btn btn-success my-3 btn-sm" type="submit">Submit</button>
                </form>
                <div id='tb_parish_sec' style="width: 80% !important;" class="mx-3 my-3 d-none">
                    <table id="tb_parish" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name Parish</th>

                            </tr>
                        </thead>
                        <tbody id="tbody_parish_edit">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name Parish</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row my-1 border border-secondary border-3 rounded" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="m-2">Village Register</h3>
                    </div>
                    <div class="offset-md-1 col-md-5 mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="switch_village">
                            <label class="form-check-label mt-1" for="switch_village" id="label_village">
                                Change to View
                            </label>
                        </div>
                    </div>
                </div>
                <form id='form_village_reg' class="my-3">
                    <label class="form-label mt-1">Select Parish: </label>
                    <select class="form-control select_parish_register" name="id_lv1" id="">
                        <option value="" readonly selected>Select parish</option>
                    </select>
                    <label class="form-label mt-1">Village Name: </label>
                    <input type="text" name="name_lv2" class="form-control" placeholder="Village name" required>
                    <button class="btn btn-success btn-sm my-3 " type="submit">Submit</button>
                </form>
                <div id='tb_village_sec' style="width: 80% !important;" class="mx-3 my-3 d-none">
                    <table id="tb_village" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name Village</th>
                                <th>Name Parish</th>


                            </tr>
                        </thead>
                        <tbody id="tbody_village_edit">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name Village</th>
                                <th>Name Parish</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row mb-1 border border-secondary border-3 rounded" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="m-2">Complementary address</h3>
                    </div>
                    <div class="offset-md-1 col-md-5 mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="switch_comp">
                            <label class="form-check-label mt-1" for="switch_comp" id="label_comp">
                                Change to View
                            </label>
                        </div>
                    </div>

                </div>
                <form id='form_compleAdmin_reg' class="my-3">
                    <label class="form-label mt-1">Select Village: </label>
                    <select class="form-control select_village_register" name="id_lv2" id="">
                        <option value="" readonly selected>Select Village</option>
                    </select>
                    <label class="form-label mt-1">Complementary address Name: </label>
                    <input type="text" name="name_lv3" class="form-control" placeholder="Complementary address name" required>
                    <button class="btn btn-success my-3 btn-sm" type="submit">Submit</button>
                </form>
                <div id='tb_comp_sec' style="width: 80% !important;" class="mx-3 my-3 d-none">
                    <table id="tb_comple" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Complementary Address Name</th>

                            </tr>
                        </thead>
                        <tbody id="tbody_comp_edit">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Complementary Address Name</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="modal_pdoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Plant Doctor Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id='form_pdoctor_edit' class="m-3">
                <div class="modal-body" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                    <label class="form-label mt-3">Name: </label>
                    <input type="text" name="pdoc_name" class="form-control" placeholder="Plant doctor name" required>
                    <input type="hidden" name="id_plant_doc">
                    <label class="form-label mt-3">Last Name: </label>
                    <input type="text" name="pdoc_lastname" class="form-control" placeholder="Plant doctor last name" required>
                    <label class="form-label mt-3">Phone: </label>
                    <input type="text" name="pdoc_phone" class="form-control" placeholder="Plant doctor Phone" required>
                    <label class="form-label mt-3">Email: </label>
                    <input type="email" name="pdoc_email" class="form-control" placeholder="Plant doctor email" required>
                    <label class="form-label mt-3">Ocupation: </label>
                    <input type="text" name="pdoc_ocupation" class="form-control" placeholder="Plant doctor ocupation">
                    <label class="form-label mt-3">Type of Entity: </label>
                    <input type="text" name="pdoc_type_entity" class="form-control" placeholder="Plant doctor entity">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success my-3" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_crop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Crop Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id='form_crop_edit' class="m-3">
                <div class="modal-body" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                    <label class="form-label mt-1">Crop Name: </label>
                    <input type="text" name="Crop_name" class="form-control" placeholder="Crop Name" required>
                    <input type="hidden" name="id_crop">
                    <label class="form-label mt-1">Local Crop Name: </label>
                    <input type="text" name="Local_crop_name" class="form-control" placeholder="Local Crop Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success my-3" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_parish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Parish Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id='form_parish_edit' class="m-3">
                <div class="modal-body" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                    <label class="form-label mt-1">Parish Name: </label>
                    <input type="hidden" name="id_lv1">
                    <input type="text" name="name_lv1" class="form-control" placeholder="Parish Name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success my-3" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_village" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Village Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id='form_village_edit' class="m-3">
                <div class="modal-body" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                    <label class="form-label mt-1">Select Parish: </label>
                    <select class="form-control select_parish_register" name="id_lv1" id="">
                        <option value="" readonly selected>Select parish</option>
                    </select>
                    <label class="form-label mt-1">Village Name: </label>
                    <input type="hidden" name="id_lv2" class="form-control" placeholder="Village name" required>
                    <input type="text" name="name_lv2" class="form-control" placeholder="Village name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success my-3" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_com" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Complementary adress Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id='form_comp_edit' class="m-3">
                <div class="modal-body" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                    <label class="form-label mt-1">Select Village: </label>
                    <select class="form-control select_village_register" name="id_lv2" id="">
                        <option value="" readonly selected>Select Village</option>
                    </select>
                    <label class="form-label mt-1">Complementary Address Name: </label>
                    <input type="hidden" name="id_lv3" class="form-control" required>
                    <input type="text" name="name_lv3" class="form-control" placeholder="Complementary adress name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success my-3" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_var" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Variety Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id='form_var_edit' class="m-3">
                <div class="modal-body" style="padding: 1em; border: 6px solid #dee2e6 !important;">
                    <label class="form-label mt-1">Select Crop: </label>
                    <select class="form-control select_Variety_register" name="id_crop" id="">
                        <option value="" readonly selected>Select Crop</option>
                    </select>
                    <label class="form-label mt-1">Variety Name: </label>
                    <input type="hidden" name="id_variety" class="form-control" required>
                    <input type="text" name="name_variety" class="form-control" placeholder="Variety name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success my-3" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>