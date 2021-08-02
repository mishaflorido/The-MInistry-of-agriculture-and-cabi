<form>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegister" class="form-label"> Vendor Registration form</label>
    </div>
    <div class="container">
        <!-- start input section -->
        <div>
            <label for="date_reg" class="form-label"> Register date: </label>
        </div>
        <div class="row">
            <div class="col">
                <p>1. Name: <input type="text" class="v_name" placeholder="Name" name="v_name"></p>
            </div>
            <div class="col">
                <p>Alias: <input type="text" class="v_alias" placeholder="Alias" name="v_alias"></p>
            </div>
        </div>
        <div>
            <p>3. Home address: <input type="text" class="addres" placeholder="Home address" name="address"></p>
        </div>
        <div class="row">
            <div>
                <p>4. Telephone number: (H) <input type="text" class="phone_num" placeholder="Telephone number" name="phone_num"></p>
            </div>
            <div class="col">
                <p>4. Telephone number: (C)<input type="text" class="phone_num" placeholder="Telephone number" name="phone_num"></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class=" row">
                <span class="input-group-text"> Are you currently occuping a booth/stall/table?</span>
            </div>
            <div class="form-control">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="v_table" id="yes">
                    <label class="form-check-label" for="yes"> Yes </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="v_table" id="no">
                    <label class="form-check-label" for="no"> No </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class=" row">
                <span class="input-group-text"> How long have you been vending?</span>
            </div>
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
    <div style="text-align: left" class="mb-3">
        <label for="Typwbusssines"> Type of businesss:</label>
    </div>
    <div class="container">
        <div class=" row">
            <div class="col-md-6">
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        Vegetables: <input class="form-check-input" type="checkbox" name="veg" id="veg">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type=text class="form-llbs" name="veg_lbs" id="veg_lbs">
                    </div>
                </div>
            </div>
        </div>
        <div class=" row">
            <div class="col-md-6">
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        Root tubers: <input class="form-check-input" type="checkbox" name="roots" id="roots">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type=text class="form-llbs" name="rot_lbs" id="rot_lbs">
                    </div>
                </div>
            </div>
        </div>
        <div class=" row">
            <div class="col-md-6">
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        Spices: <input class="form-check-input" type="checkbox" name="spices" id="spices">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type=text class="form-llbs" name="spc_lbs" id="spc_lbs">
                    </div>
                </div>
            </div>
        </div>
        <div class=" row">
            <div class="col-md-6">
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        Fresh fruits juices: <input class="form-check-input" type="checkbox" name="fruits" id="fruits">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type=text class="frt-llbs" name="frt_lbs" id="frt_lbs">
                    </div>
                </div>
            </div>
        </div>
        <div class=" row">
            <div class="col-md-6">
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        Others: <input class="form-check-input" type="checkbox" name="b_other" id="b_other">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type=text class="frt-llbs" name="b_oth_lbs" id="b_oth_lbs">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class=" row">
                <span class="input-group-text"> For vendors of agriculrual produce: Are you the sole producer?</span>
            </div>
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

    <div class=" row">
        <span class="input-group-text"> If No, please supply the following information of produce supply:</span>
    </div>
    <div class="row">
        <div class="col-md-1 text-center">
            <div class="d-inline-flex text-center mt-4">
                <a class="form-control" role="button" id="add_prod_sup" onclick="add_prod()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
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

                    <tbody id='tbody_parcel'>
                        <tr>
                            <td><input type="text" name="prod_sup_name" placeholder="" class="form-control"></td>
                            <td><input type="text" name="prod_address" placeholder="" class="form-control"></td>
                            <td><input type="number" name="prod_numh" placeholder="" class="form-control"></td>
                            <td><input type="number" name="prod_numc" placeholder="" class="form-control"></td>
                            <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class=" row">
            <span class="input-group-text"> FEES, please tick the apropiate box</span>
        </div>
        <div class="row">
            <div class="col-md-2 form-check-inline"">
                <span class=" input-group-text">Annual Fee: <input class=" form-check-input" type="checkbox" name="v_fee_ann" id="v_fee_ann"></span>

            </div>
            <div class="col-md-2 form-check-inline">
                <span class="input-group-text">Montly Fee:<input class="form-check-input" type="checkbox" name="v_fee_mon" id="v_fee_mon"></span>

            </div>
            <div class="col-md-2 form-check-inline">
                <span class="input-group-text"> Weekly fee:<input class="form-check-input" type="checkbox" name="v_fee_wek" id="v_fee_wek"></span>

            </div>
            <div class="col-md-2 form-check-inline">
                <span class="input-group-text">Daily Fee:<input class="form-check-input" type="checkbox" name="v_fee_dai" id="v_fee_dai"></span>

            </div>
            <div class="col-md-2 form-check-inline">
                <span class="input-group-text">No Fee:<input class="form-check-input" type="checkbox" name="v_no_fee" id="v_no_fee"></span>
            </div>
        </div>

        <div class="form-control">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>