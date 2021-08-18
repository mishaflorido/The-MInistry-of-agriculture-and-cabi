<form>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegister" class="form-label"> WEEKLY DATA COLLECTION FORM PRAEDIAL LARCENY PROGRAMME </label>
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
                        <a class="form-control" role="button" id="add_praedial" onclick="add_praedial()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Crop Name</th>
                                    <th scope="col">Plot Size(Acre)</th>
                                    <th scope="col">No Of Stools</th>
                                    <th scope="col">Date Planted</th>
                                    <th scope="col">Variety</th>
                                    <th scope="col">Stage Of Maturity</th>
                                    <th scope="col">Expected Harvest Date(S)</th>
                                    <th scope="col">Expect-Ed Yield</th>
                                    <th scope="col">Activities Carried Out By Farmers</th>
                                    <th scope="col">Type And Quantity Of Assistance Received From Moa</th>
                                    <th scope="col">No Of Farm Visits</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_produce_supply'>
                                <tr>
                                    <td><input type="text" name="crop_name" placeholder="" class="form-control crop_name"></td>
                                    <td><input type="number" name="plot_size" placeholder="" class="form-control plot_size"></td>
                                    <td><input type="number" name="num_stools" placeholder="" class="form-control num_stools"></td>
                                    <td><input type="date" name="date_planted" placeholder="" class="form-control date_planted"></td>
                                    <td><input type="text" name="crop_var" placeholder="" class="form-control crop_var"></td>
                                    <td><input type="text" name="stg_mat" placeholder="" class="form-control stg_mat"></td>
                                    <td><input type="date" name="harv_date" placeholder="" class="form-control harv_date"></td>
                                    <td><input type="text" name="exp_yield" placeholder="" class="form-control exp_yield"></td>
                                    <td><input type="text" name="act_carr" placeholder="" class="form-control act_carr"></td>
                                    <td><input type="number" name="num_visits" placeholder="" class="form-control num_visits"></td>
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