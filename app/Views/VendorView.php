<form>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">Grenada and Ministry of agricultural, lands and forestry</label>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegister" class="form-label"> Vendor Registration form</label>
    </div>
    <div class="container">
        <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
            <!-- start input section -->
            <div class="text-center mb-2">
                <label for="date_reg" class="form-label"> Register date: </label>
                <input type='date' class="form-control" name="date_register_vendor" value="<?= date("Y-m-d") ?>">
            </div>
            <hr>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text"> 1. Name: </span>
                    <input type="text" class="form-control v_name" placeholder="Name" name="v_name">
                </div>
                <div class="col-md-6 ">
                    <span class="input-group-text"> Alias: </span>
                    <input type="text" class="form-control v_alias" placeholder="Alias" name="v_alias">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-4">
                    <span class="input-group-text">3. Home address: </span>
                    <input type="text" class="form-control addres" placeholder="Home address" name="address">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">4. Telephone number: (H) </span>
                    <input type="text" class="form-control phone_num" placeholder="Telephone number" name="phone_num">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">4. Telephone number: (C) </span>
                    <input type="text" class="form-control phone_num" placeholder="Telephone number" name="phone_num">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text text-wrap"> Are you currently occuping a booth/stall/table?</span>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="v_table" id="yes_oc">
                            <label class="form-check-label" for="yes_oc"> Yes </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="v_table" id="no_oc">
                            <label class="form-check-label" for="no_oc"> No </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <span class="input-group-text text-wrap"> How long have you been vending?</span>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="v_long" id="years">
                            <label class="form-check-label" for="years"> Years </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="v_long" id="months">
                            <label class="form-check-label" for="months"> Months </label>
                        </div>
                    </div>
                </div>
            </div>



            <div class=" row my-2">
                <div class="col-md-6">

                    <div style="text-align: left">
                        <span class="input-group-text"> Type of businesss:</span>

                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Vegetables: <input class="form-check-input" type="checkbox" name="veg" id="veg">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="form-llbs" name="veg_lbs" id="veg_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Spices: <input class="form-check-input" type="checkbox" name="spices" id="spices">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="form-llbs" name="spc_lbs" id="spc_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Others: <input class="form-check-input" type="checkbox" name="b_other" id="b_other">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="frt-llbs" name="b_oth_lbs" id="b_oth_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Root tubers: <input class="form-check-input" type="checkbox" name="roots" id="roots">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="form-llbs" name="rot_lbs" id="rot_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Fresh fruits juices: <input class="form-check-input" type="checkbox" name="fruits" id="fruits">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="frt-llbs" name="frt_lbs" id="frt_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <span class="input-group-text text-wrap"> For vendors of agriculrual produce: Are you the sole producer?</span>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="v_prod" id="yes">
                            <label class="form-check-label" for="yes"> Yes </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="v_prod" id="no">
                            <label class="form-check-label" for="no"> No </label>
                        </div>
                    </div>

                </div>

            </div>



            <div class=" row my-2">
                <div class="col-md-12">

                    <span class="input-group-text text-wrap"> If No, please supply the following information of produce supply:</span>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-1 text-center">
                    <div class="d-inline-flex text-center mt-4">
                        <a class="form-control" role="button" id="add_prod_sup" onclick="add_produce_supply()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Farmer(s) Name(s)</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact number (H)</th>
                                    <th scope="col">Contact number (C)</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_produce_supply'>
                                <tr>
                                    <td><input type="text" name="prod_sup_name" placeholder="" class="form-control prod_sup_name"></td>
                                    <td><input type="text" name="prod_address" placeholder="" class="form-control prod_address"></td>
                                    <td><input type="number" name="prod_numh" placeholder="" class="form-control prod_numh"></td>
                                    <td><input type="number" name="prod_numc" placeholder="" class="form-control prod_numc"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class=" row">
                <div class="col-md-12">
                    <span class="input-group-text text-wrap"><strong> FEES:</strong> (please tick the apropiate box)</span>
                </div>
            </div>
            <div class="row my-2">

                <div class="offset-sm-1 col-md-2 form-check-inline form-control">
                    <span class="ml-2">Annual Fee: <input class=" form-check-input mx-2" style="width: 1.5em; height: 1.5em;" type="checkbox" name="v_fee_ann" id="v_fee_ann"></span>

                </div>
                <div class="col-md-2 form-check-inline form-control">
                    <span class="ml-2">Montly Fee:<input class=" form-check-input mx-2" style="width: 1.5em; height: 1.5em;" type="checkbox" name="v_fee_mon" id="v_fee_mon"></span>

                </div>
                <div class="col-md-2 form-check-inline form-control">
                    <span class="ml-2"> Weekly fee:<input class="form-check-input mx-2" style="width: 1.5em; height: 1.5em;" type="checkbox" name="v_fee_wek" id="v_fee_wek"></span>

                </div>
                <div class="col-md-2 form-check-inline form-control">
                    <span class="ml-2">Daily Fee:<input class="form-check-input mx-2" style="width: 1.5em; height: 1.5em;" type="checkbox" name="v_fee_dai" id="v_fee_dai"></span>

                </div>
                <div class="col-md-2 form-check-inline form-control">
                    <span class="ml-2">No Fee:<input class="form-check-input mx-2" style="width: 1.5em; height: 1.5em;" type="checkbox" name="v_no_fee" id="v_no_fee"></span>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text text-wrap">Do you have a vendor's health certificate</span>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vc_health" id="yes_vc">
                            <label class="form-check-label" for="yes_oc"> Yes </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vc_health" id="no_vc">
                            <label class="form-check-label" for="no_oc"> No </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="input-group-text text-wrap">If yes, please provide the number</span>
                    <div class="form-control">
                        <input type="text" name="n_vc_health" id="n_vc_health" placeholder="Number of vendor's health certificate">
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text text-wrap">Inter-Regional Source</span>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ir_source" id="yes_ir">
                            <label class="form-check-label" for="yes_oc"> Yes </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ir_source" id="no_ir">
                            <label class="form-check-label" for="no_oc"> No </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="input-group-text text-wrap">If yes, please supply the following information.</span>
                    <div class="form-control">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="chb_trinidad" value="option1">
                                    <label class="form-check-label" for="chb_trinidad">Trinidad</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="chb_vicent" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">St. Vicent</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="other_ir" id="inp_other" placeholder="Other (please specify)">
                        </div>
                    </div>

                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12">
                    <span class="input-group-text text-wrap"><strong> SALE TIME:</strong> (please tick the apropiate box)</span>
                </div>
            </div>
            <div class="row my-2">


                <div class="col-md-3 form-check-inline form-control ml-2">
                    <span class="ml-2">Monday-Friday: <input class=" form-check-input mx-2" style="width: 1.5em; height: 1.5em;" type="checkbox" name="v_fee_ann" id="v_fee_ann"></span>

                </div>
                <div class="col-md-3 form-check-inline form-control">
                    <span class="ml-2">Monday-Saturday:<input class=" form-check-input mx-2" style="width: 1.5em; height: 1.5em;" type="checkbox" name="v_fee_mon" id="v_fee_mon"></span>

                </div>
                <div class="col-md-2 form-check-inline form-control">
                    <span class="ml-2">Friday Only:<input class="form-check-input mx-2" style="width: 1.5em; height: 1.5em;" type="checkbox" name="v_fee_wek" id="v_fee_wek"></span>

                </div>
                <div class="col-md-3 form-check-inline form-control">
                    <span class="ml-2">Saturday Only:<input class="form-check-input mx-2" style="width: 1.5em; height: 1.5em;" type="checkbox" name="v_fee_dai" id="v_fee_dai"></span>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" id="" placeholder="Other (please specify)">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">

                    <div style="text-align: left">
                        <span class="input-group-text"> Type of Crops:</span>

                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Vegetable, Fruits: <input class="form-check-input" type="checkbox" name="veg" id="veg">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="form-llbs" name="veg_lbs" id="veg_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Root Tubers: <input class="form-check-input" type="checkbox" name="veg" id="veg">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="form-llbs" name="veg_lbs" id="veg_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Spices: <input class="form-check-input" type="checkbox" name="spices" id="spices">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="form-llbs" name="spc_lbs" id="spc_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>

                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Fresh fruits juices: <input class="form-check-input" type="checkbox" name="fruits" id="fruits">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="frt-llbs" name="frt_lbs" id="frt_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Grains <input class="form-check-input" type="checkbox" name="roots" id="roots">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="form-llbs" name="rot_lbs" id="rot_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Others: <input class="form-check-input" type="checkbox" name="b_other" id="b_other">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type=text class="frt-llbs" name="b_oth_lbs" id="b_oth_lbs" placeholder="N° of Libs" style="border: 1px solid #ced4da;    border-radius: 0.25rem;">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="text-align: left">
                        <span class="input-group-text"> How often?:</span>
                    </div>
                    <div class="form-control">
                        <div class="form-check form-check-inline">
                            Weekly: <input class="form-check-input" type="checkbox" name="b_other" id="b_other">
                        </div>
                        <div class="form-check form-check-inline">
                            Monthly: <input class="form-check-input" type="checkbox" name="b_other" id="b_other">
                        </div>
                    </div>
                    <input type="text" class="form-control" name="" id="" placeholder="Other (please specify)">

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