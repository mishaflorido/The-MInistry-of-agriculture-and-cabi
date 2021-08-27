<form>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegister" class="form-label"> PLANT APLICATION FORM </label>
    </div>
    <div class="container">
        <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
            <!-- start input section -->

            <div class="row">
                <div class="col-md-6">
                    <span class="input-group-text">Name: </span>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Name" name="name_f">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name_f">
                        <input type="text" class="form-control" placeholder="Mother Last Name" name="mo_last_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">MOA FARMERS ID# </span>
                    <input type="number" class="form-control" placeholder="MOA farmers id" name="id_farm">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <span class="input-group-text">ADDRES: </span>
                    <input type="text" class="form-control" placeholder="Addres" name="f_addres">
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">LOCATION OF PLOTS </span>
                    <input type="text" class="form-control" placeholder="Location" name="plt_loc">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <span class="input-group-text">Tel. N°: </span>
                    <input type="number" class="form-control" placeholder="Tel. Number" name="f_phone">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">ACREAGE(S): </span>
                    <input type="numbre" class="form-control" placeholder="Acreage" name="f_acr">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">EXT´N DISTRICT </span>
                    <input type="text" class="form-control" placeholder="Extension district" name="f_dst">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <span class="input-group-text">DATE APPLIED: </span>
                    <input type="date" class="form-control" placeholder="" name="f_date_apl">
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">EXTENSION OFFICER </span>
                    <input type="text" class="form-control" placeholder="Extension officer" name="plt_ofc">
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Plant type/Variety</th>
                                    <th scope="col">Request</th>
                                    <th scope="col">Recom.</th>
                                    <th scope="col">Approved</th>
                                    <th scope="col">Received</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_plant_aplication'>
                                <tr>
                                    <td><input type="text" name="plant_crop" placeholder="" class="form-control plant_crop"></td>
                                    <td><input type="text" name="plant_req" placeholder="" class="form-control plant_req"></td>
                                    <td><input type="text" name="plant_recom" placeholder="" class="form-control plant_recom"></td>
                                    <td><input type="text" name="plant_approv" placeholder="" class="form-control plant_approv"></td>
                                    <td><input type="text" name="plant_received" placeholder="" class="form-control plant_received"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="text-align: center" class="mb-3">
                <label for="FarmRegister" class="form-label"> To be completed by Extensión Officer </label>
                <label for="FarmRegister" class="form-label">1. Pre-planting inspection: (eg. Area cleared, status of lining of plots, drains, establishment of shade, holes dug, etc.)</label>
            </div>

            <div class="row my-2">
                <div class="col-md-1 text-center">
                    <div class="d-inline-flex text-center mt-4">
                        <a class="form-control" role="button" id="add_pre_planting" onclick="add_preplnt()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Date of visit</th>
                                    <th scope="col">Commments</th>
                                    <th scope="col">Extn. Officer</th>
                                    <th scope="col">Supervisor</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_pre_pln_inspection'>
                                <tr>
                                    <td><input type="date" name="pre_date_visit" placeholder="" class="form-control pre_date_visit"></td>
                                    <td><input type="text" name="pre_com" placeholder="" class="form-control pre_com"></td>
                                    <td><input type="text" name="plant_approv" placeholder="" class="form-control plant_approv"></td>
                                    <td><input type="text" name="plant_received" placeholder="" class="form-control plant_received"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div style="text-align: center" class="mb-3">
                    <label for="FarmRegister" class="form-label">2. Post-planting inspection: (eg. Plants planted; field condition – weeds, rootstock growth; pests & diseases ; # of deaths; cause of death, etc)</label>
                </div>

                <div class="col-md-1 text-center">
                    <div class="d-inline-flex text-center mt-4">
                        <a class="form-control" role="button" id="add_pst_planting" onclick="add_pstplnt()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Date of visit</th>
                                    <th scope="col">Commments</th>
                                    <th scope="col">Extn. Officer</th>
                                    <th scope="col">Supervisor</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_pst_pln_inspection'>
                                <tr>
                                    <td><input type="date" name="pos_date_visit" placeholder="" class="form-control pos_date_visit"></td>
                                    <td><input type="text" name="pos_Comments" placeholder="" class="form-control pos_Comments"></td>
                                    <td><input type="text" name="plant_approv" placeholder="" class="form-control plant_approv"></td>
                                    <td><input type="text" name="plant_received" placeholder="" class="form-control plant_received"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="col-md-1 text-center">
                    <div class="d-inline-flex text-center mt-4">
                        <a class="form-control" role="button" id="add_fut_dev" onclick="add_fut_dev()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">3. Potential for Future Development: (eg. Plans for expansion, overall plan for farm, etc.)</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_pst_pln_inspection'>
                                <tr>
                                    <td><input type="text" name="fut_dev" placeholder="" class="form-control fut_dev"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="row my-4">
                <div class="d-grid gap-2 col-md-6 mx-auto">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>