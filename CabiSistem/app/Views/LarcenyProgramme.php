<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">Crop Establishment and Production Information</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#start_page" aria-expanded="false" aria-controls="start_page" style="padding-top: 0; padding-right:0">Home</a></li>
                    <li class="breadcrumb-item active">Crop Establishment</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Container of Page -->

<!-- AQUI ENTRE TODO EL CONTENIDO -->


<form class="praedial_lancery">
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegister" class="form-label"> Crop Establishment and Production Information </label>
    </div>

    <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
        <!-- start input section -->
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <!-- Alert -->
                <div class="alert alert-success d-none" role="alert" id="alert_lancery_programme">

                </div>
                <!-- ///////// -->
            </div>
        </div>


        <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
            <!-- start input section -->
            <input type="hidden" name='id_praedial'>

            <div class=" row my-2">
                <div class="col-md-6">
                    <span class="input-group-text text-wrap">Registration Number</span>
                    <input type="text" name="registration_number" placeholder="N° registration" class="form-control">
                </div>
                <div class="col-md-6">
                    <span class="input-group-text text-wrap">Farmer Name</span>
                    <input type="text" name="farmer_name" placeholder="Name" class="form-control">
                </div>
            </div>
            <div class=" row my-2">
                <div class="col-md-6">
                    <span class="input-group-text text-wrap">Land Parcel Address</span>
                    <input type="text" name="parcel_address" placeholder="parcel address" class="form-control">
                </div>
                <div class="col-md-6">
                    <span class="input-group-text text-wrap">Parcel Number</span>
                    <input type="text" name="parcel_number" placeholder="parcel number" class="form-control">
                </div>
            </div>
            <hr>
            <!-- <div class="col-md-1 text-center"> -->
            <div class="row">
                <div class="d-inline-flex text-center mt-4">
                    <a class="form-control" role="button" id="add_praedial" onclick="add_praedial()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                </div>
            </div>
            <!-- </div> -->
            <div class="row my-2">
                <!-- <div class="col-md-11"> -->
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Crop Name</th>
                                <th scope="col">Plot Size(sq ft)</th>
                                <th scope="col">No Of Stools</th>
                                <th scope="col">Date Planted</th>
                                <th scope="col">Variety</th>
                                <th scope="col">Stage Of Maturity</th>
                                <th scope="col">Expected <br>Harvest Date(S)</th>
                                <th scope="col">Expect-Ed Yield</th>
                                <th scope="col">Activities Carried Out By Farmers</th>
                                <th scope="col">
                                    Type Quantity Of <br> Assistance Received From Moa
                                </th>
                                <th scope="col">No Of Farm Visits</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>

                        <tbody id='tbody_produce'>
                            <tr>
                                <td><input type="text" name="crop_name" placeholder="" style="width: auto" class="form-control crop_name"></td>
                                <td><input type="number" step="any" name="plot_size" placeholder="" class="form-control plot_size"></td>
                                <td><input type="number" step="any" name="n_stools" placeholder="" class="form-control n_stools"></td>
                                <td><input type="date" name="date_planted" placeholder="" class="form-control date_planted"></td>
                                <td><input type="text" name="variety" placeholder="" style="width: auto" class="form-control variety"></td>
                                <td><input type="text" name="stage_maturity" placeholder="" style="width: auto" class="form-control stage_maturity"></td>
                                <td> <input type="date" name="harvest_date" placeholder="" class="form-control  harvest_date"> </td>
                                <td><input type="text" name="yield" placeholder="" style="width: auto" class="form-control yield"></td>
                                <td><input type="text" name="activities_carried" style="width: auto" placeholder="" class="form-control activities_carried"></td>
                                <td><input type="text" name="taq_arf_moa" style="width: auto" placeholder="" class="form-control taq_arf_moa"></td>
                                <td><input type="number" step="any" name="n_farm_visits" placeholder="" class="form-control n_farm_visits"></td>
                                <td><input type="text" name="remarks" placeholder="" style="width: auto" class="form-control remarks"></td>
                                <td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- </div> -->
            </div>


            <div class="row my-4">
                <div class="d-grid gap-2 col-md-6 mx-auto">
                    <button type="submit" class="btn btn-success" id="lancery_btn_submit">
                        <span class="spinner-border spinner-border-sm d-none spin_lancery" role="status" aria-hidden="true"></span>
                        <span class="d-none spin_lancery">Loading...<br></span>
                        <span class="d-none spin_lancery"> Please Wait</span>
                        <span class="not_spin_lancery"> Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</form>




<!-- END of Container -->