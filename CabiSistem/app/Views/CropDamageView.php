<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">Crop Damage Data Form</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#start_page" aria-expanded="false" aria-controls="start_page" style="padding-top: 0; padding-right:0">Home</a></li>
                    <li class="breadcrumb-item active">Crop Damage Data Form</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<form class="crop_damage_form">
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegister" class="form-label"> CROP DAMAGE DATA </label>
    </div>
    <div class="container">
        <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
            <!-- start input section -->
            <div class="row">
                <div class="offset-lg-1 col-lg-10">
                    <!-- Alert -->
                    <div class="alert alert-success d-none" role="alert" id="alert_crop_dmg">

                    </div>
                    <!-- ///////// -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <span class="input-group-text">EXTENSION DISTRICT: </span>
                    <input type="text" class="form-control" placeholder="Extensión district" name="cdf_ext_dist" id="cdf_ext_dist">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">DATE OF DISASTER: </span>
                    <input type="DATE" class="form-control" placeholder="" name="cdf_date_dis" id="cdf_date_dis">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">TYPE OF DISASTER: </span>
                    <input type="text" class="form-control" placeholder="Type of disaster" name="cdf_typ_dis" id="cdf_typ_dis">
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-1 text-center">
                    <div class="d-inline-flex text-center mt-4">
                        <a class="form-control" role="button" id="add_cropdmg" onclick="add_cropdmg()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="container">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">name of farmer</th>
                                    <th scope="col">Date of visit</th>
                                    <th scope="col">Farmer Reg. #</th>
                                    <th scope="col">Contac info</th>
                                    <th scope="col">Variety</th>
                                    <th scope="col">Location of farm(s)</th>
                                    <th scope="col">Total Acreage/Sq ft. of Parcel</th>
                                    <th scope="col">Description of Damage</th>
                                    <th scope="col">Area of Plot In Sq Ft.</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_crop_damage'>
                                <tr>
                                    <td><input type="text" name="farmer_name_crd" placeholder="" class="form-control farmer_name_crd"></td>
                                    <td><input type="date" name="visit_date_crd" placeholder="" class="form-control visit_date_crd"></td>
                                    <td><input type="text" name="farmer_reg_crd" placeholder="" class="form-control farmer_reg_crd"></td>
                                    <td><input type="text" name="contact_crd" placeholder="" class="form-control contact_crd"></td>
                                    <td><input type="text" name="crop_var_crd" placeholder="" class="form-control crop_var_crd"></td>
                                    <td><input type="text" name="location_crd" placeholder="" class="form-control location_crd"></td>
                                    <td><input type="number" step="any" name="tot_acre_crd" placeholder="" class="form-control tot_acre_crd"></td>
                                    <td><input type="text" name="desc_dmg_crd" placeholder="" class="form-control desc_dmg_crd"></td>
                                    <td><input type="number" step="any" name="area_plot_crd" placeholder="" class="form-control area_plot_crd"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="row my-2">
                <div class="col-md-1 text-center">
                    <div class="d-inline-flex text-center mt-4">
                        <a class="form-control" role="button" id="add_stools" onclick="add_stools()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="container">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">No. of Stools</th>
                                    <th scope="col">Amount in Each Stool</th>
                                    <th scope="col">Age of Plants (weeks)</th>
                                    <th scope="col">Stage of Maturity</th>
                                    <th scope="col">Cost Per Plant</th>
                                    <th scope="col">Total Value </th>
                                    <th scope="col">Officer Collecting Data</th>
                                    <th scope="col">Certified by</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_stools'>
                                <tr>
                                    <td><input type="number" step="any" name="num_stools" placeholder="" class="form-control num_stools"></td>
                                    <td><input type="number" step="any" name="amount" placeholder="" class="form-control amount"></td>
                                    <td><input type="number" step="any" name="age_plants" placeholder="" class="form-control age_plants"></td>
                                    <td><input type="text" name="stage_mat" placeholder="" class="form-control stage_mat"></td>
                                    <td><input type="number" step="any" name="cost_plant" placeholder="" class="form-control cost_plant"></td>
                                    <td><input type="number" step="any" name="tot_val" placeholder="" class="form-control tot_val"></td>
                                    <td><input type="text" name="ofc_collec" placeholder="" class="form-control ofc_collec"></td>
                                    <td><input type="text" name="cert_by" placeholder="" class="form-control cert_by"></td>
                                    <td><input type="text" name="remark_stools" placeholder="" class="form-control remark"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="d-grid gap-2 col-md-6 mx-auto">
                    <button type="button" id="submit_crop_damage" class="btn btn-success">
                        <span class="spinner-border spinner-border-sm d-none spin_crop_dmg" role="status" aria-hidden="true"></span>
                        <span class="d-none spin_crop_dmg">Loading...<br></span>
                        <span class="d-none spin_crop_dmg"> Please Wait</span>
                        <span class="not_spin_cdmg"> Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</form>