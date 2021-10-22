<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0"> Pesticide Application – Field Record Sheet</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#start_page" aria-expanded="false" aria-controls="start_page" style="padding-top: 0; padding-right:0">Home</a></li>
                    <li class="breadcrumb-item active"> Pesticide Application</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div style="text-align: center" class="mb-3">
    <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
</div>
<div style="text-align: center" class="mb-3">
    <label for="FarmRegister" class="form-label"> PEST APPLICATION FORM </label>
</div>

<div class="container">
    <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <!-- Alert -->
                <div class="alert alert-success d-none" role="alert" id="alert_pestapp">

                </div>
                <!-- ///////// -->
            </div>
        </div>
        <div class="row my-2">
            <div class="offset-md-3 col-md-6">
                <span class="input-group-text">Supervisor signature</span>
                <input type="text" class="form-control" placeholder="Supervisor" name="spsig_pestapp" id="spsig_pestapp">
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-1 text-center">
                <div class="d-inline-flex text-center mt-4">
                    <a class="form-control" role="button" id="add_praedial" onclick="add_pesticide()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                </div>
            </div>
            <div class="col-md-11" style="overflow-x: auto;">
                <table class="table table-sm table-success">
                    <thead>
                        <tr>
                            <th scope="col">Farmer Name, Address, tel # </th>
                            <th scope="col">Date</th>
                            <th scope="col">Crop(s)</th>
                            <th scope="col">Plot size</th>
                            <th scope="col">Target Pest </th>
                            <th scope="col">Pesticide</th>
                            <th scope="col">Rate of application </th>
                            <th scope="col">Amt. applied (gal) </th>
                            <th scope="col">Comments</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <tbody id='tbody_pesticide'>
                        <tr>
                            <td><textarea name="inf_far" placeholder="" class="form-control inf_far" rows="1"> </textarea></td>
                            <td><input type="date" name="date_pestapp" placeholder="" class="form-control date_pestapp" style="width: 100px;"></td>
                            <td><input list="crop_pestapp_list" name="crop_pestapp" placeholder="" class="form-control crop_pestapp">
                                <datalist id="crop_pestapp_list"></datalist>
                            </td>
                            <td><input type="text" name="plsi_pestapp" placeholder="" class="form-control plsi_pestapp"></td>
                            <td><input type="text" name="targ_pestapp" placeholder="" class="form-control targ_pestapp"></td>
                            <td><input type="text" name="pest_pestapp" placeholder="" class="form-control pest_pestapp"></td>
                            <td><input type="text" name="rate_pestapp" placeholder="" class="form-control rate_pestapp"> </td>
                            <td><input type="text" name="amt_pestapp" placeholder="" class="form-control amt_pestapp"></td>
                            <td><textarea name="com_pestapp" placeholder="" class="form-control com_pestapp" rows="1"></textarea></td>
                            <td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row my-4">
            <div class="d-grid gap-2 col-md-6 mx-auto">
                <button type="submit" class="btn btn-success" id="btn_pestapp">
                    <span class="spinner-border spinner-border-sm d-none spin_pestapp" role="status" aria-hidden="true"></span>
                    <span class="d-none spin_pestapp">Loading...<br></span>
                    <span class="d-none spin_pestapp"> Please Wait</span>
                    <span class="not_spin_pestapp"> Submit</span>
                </button>
            </div>
        </div>
    </div>
</div>