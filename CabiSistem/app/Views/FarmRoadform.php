<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">List of Farm Roads That Need Urgent Attention</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#start_page" aria-expanded="false" aria-controls="start_page" style="padding-top: 0; padding-right:0">Home</a></li>
                    <li class="breadcrumb-item active">List of Farm Roads</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="">
    <!-- AQUI ENTRE TODO EL CONTENIDO -->
    <form class="farm_roads">
        <div style="text-align: center" class="mb-3">
            <label for="FarmRegisterForm" class="form-label">Grenada and Ministry of agricultural, lands and forestry</label>
        </div>
        <div style="text-align: center" class="mb-3">
            <label for="FarmRegister" class="form-label"> List of Farm Roads That Need Urgent Attention</label>
        </div>
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <!-- Alert -->
                <div class="alert alert-success d-none" role="alert" id="alert_farm_roads">

                </div>
                <!-- ///////// -->
            </div>
        </div>

        <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
            <input type="hidden" name="id_farm_road">
            <!-- start input section -->
            <div class="row my-2">
                <input type="date" name="date_farm_road" class="form-control date_farm_road" value="<?php echo date('Y-m-d'); ?>" id="date_farm_road">
            </div>
            <div class="row my-2">
                <div class="col-md-1 text-center">
                    <div class="d-inline-flex text-center mt-4">
                        <a class="form-control" role="button" id="add_road" onclick="add_road()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Parish</th>
                                        <th scope="col">Village</th>
                                        <th scope="col">Complementary/adrress</th>
                                        <th scope="col">Name of Road</th>
                                        <th scope="col">Approx. length </th>
                                        <th scope="col">No of Farmers Using Road</th>
                                        <th scope="col">Agricultural Activities</th>
                                        <th scope="col">Work to Be Done</th>
                                        <th scope="col">Remarks</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody_farm_road'>
                                    <tr>
                                        <td> <select style="width: auto;" name="f_county" class="form-control select_county">
                                                <option value="0" selected readonly>County Select</option>
                                            </select></td>
                                        <td> <select style="width: 200px;" name="f_subcounty" class="form-control select_subcounty">
                                                <option value="0" selected readonly>Sub County Select (First Select County)</option>
                                            </select>
                                        </td>
                                        <td><input style="width: 200px" list="list_comp_FR" class="form-control" name="f_village" autocomplete="off" placeholder="Click To select">
                                            <datalist id="list_comp_FR">

                                            </datalist>
                                        </td>
                                        <td><input style="width: auto;" type="text" name="road_name" placeholder="" class="form-control road_name" required></td>
                                        <td><input style="width: 200px;" type="text" name="road_length" placeholder="" class="form-control road_length" required></td>
                                        <td><input style="width: 200px;" type="number" name="num_farm" placeholder="" class="form-control num_farm" required></td>
                                        <td><input style="width: 200px;" type="text" name="agr_act" placeholder="" class="form-control agr_act" required></td>
                                        <td><textarea style="width: 200px;" type="text" name="work" placeholder="" class="form-control work" rows="1" required></textarea></td>
                                        <td><textarea style="width: 200px;" type="text" name="remark" placeholder="" class="form-control remark" rows="1" required></textarea></td>
                                        <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row my-4">
                <div class="d-grid gap-2 col-md-6 mx-auto">
                    <button type="button" class="btn btn-success" id="submit_farm_road">
                        <span class="spinner-border spinner-border-sm d-none spin_farm_road" role="status" aria-hidden="true"></span>
                        <span class="d-none spin_farm_road">Loading...<br></span>
                        <span class="d-none spin_farm_road"> Please Wait</span>
                        <span class="not_spin_farm_road"> Submit</span>
                    </button>
                </div>
            </div>
        </div>

    </form>



</div>
<!-- END of Container -->