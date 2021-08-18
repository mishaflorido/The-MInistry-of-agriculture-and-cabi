<form>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegister" class="form-label"> CROP DAMAGE DATA </label>
    </div>
    <div class="container">
        <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
            <!-- start input section -->




            <div class=" row my-2">
                <div class="col-md-12">

                    <span class="input-group-text text-wrap"> xxxx</span>
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
                                    <th scope="col">name of farmer</th>
                                    <th scope="col">Date of visit</th>
                                    <th scope="col">Farmer Reg. #</th>
                                    <th scope="col">Contac info</th>
                                    <th scope="col">Location of farm(s)</th>
                                    <th scope="col">Total Acreage/Sq ft. of Parcel</th>
                                    <th scope="col">Description of Damage</th>
                                    <th scope="col">Area of Plot In Sq Ft.</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_produce_supply'>
                                <tr>
                                    <td><input type="text" name="farmer_name" placeholder="" class="form-control farmer_name"></td>
                                    <td><input type="date" name="visit_date" placeholder="" class="form-control visit_date"></td>
                                    <td><input type="number" name="Farmer_reg" placeholder="" class="form-control farmer_reg"></td>
                                    <td><input type="text" name="contact" placeholder="" class="form-control contact"></td>
                                    <td><input type="text" name="crop_var" placeholder="" class="form-control crop_var"></td>
                                    <td><input type="text" name="location" placeholder="" class="form-control location"></td>
                                    <td><input type="number" name="tot_acre" placeholder="" class="form-control tot_acre"></td>
                                    <td><input type="text" name="desc_dmg" placeholder="" class="form-control desc_dmg"></td>
                                    <td><input type="number" name="area_plot" placeholder="" class="form-control area_plot"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-11">
                <div class="container">
                    <table class="table">
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

                        <tbody id='tbody_produce_supply'>
                            <tr>
                                <td><input type="number" name="num_stools" placeholder="" class="form-control num_stools"></td>
                                <td><input type="number" name="amount" placeholder="" class="form-control amount"></td>
                                <td><input type="number" name="age_plants" placeholder="" class="form-control age_plants"></td>
                                <td><input type="text" name="stage_mat" placeholder="" class="form-control stage_mat"></td>
                                <td><input type="number" name="cost_plant" placeholder="" class="form-control cost_plant"></td>
                                <td><input type="number" name="tot_val" placeholder="" class="form-control tot_val"></td>
                                <td><input type="text" name="ofc_collec" placeholder="" class="form-control ofc_collec"></td>
                                <td><input type="text" name="cert_by" placeholder="" class="form-control cert_by"></td>
                                <td><input type="text" name="remark" placeholder="" class="form-control remark"></td>
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