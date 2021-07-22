<form>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegister" class="form-label"> Vendor Registration form</label>
    </div>
    <div class="container">
        <div>
            <label for="date_reg" class="form-label"> Register date: </label>
        </div>
        <div>
            <label for="Personal" class="Personal"> I PERSONAL</label>
        </div>
        <div>
            <div class="row">
                <div class="col">
                    <p>1. Name: <input type="text" class="v_name" placeholder="Name" name="v_name"></p>
                </div>
                <div class="col">
                    <p>AKA: <input type="text" class="v_alias" placeholder="Alias" name="v_alias"></p>
                </div>
                <div>
                    <p>3. Home address: <input type="text" class="addres" placeholder="Home address" name="address"></p>
                </div>
                <div>
                </div>
                <div>
                    <p>2. Date of Birth: <input type='date' class="form-control" name="birthdate" /></p>
                </div>
                <p>4. Telephone number: (H) <input type="text" class="phone_num" placeholder="Telephone number" name="phone_num"></p>
                <p>4. Telephone number: (C)<input type="text" class="phone_num" placeholder="Telephone number" name="phone_num"></p>
            </div>
            <div class="form-check">Are you currently occuping a booth/stall/table?
                <div class="row">
                    <div class="col-md-1">
                        <input class="form-check-input" type="radio" name="v_table" id="sex">
                        <label class="form-check-label" for="sex"> Male </label>
                    </div>
                    <div class="col-md-2">
                        <input class="form-check-input" type="radio" name="sex" id="sex">
                        <label class="form-check-label" for="sex"> Female </label>
                    </div>
                </div>
            </div>

            <div>
                <label for="involved" class="involved"> 6. Name(s) of others in households / group involved in the farming bussines </label>

                <div class="row">
                    <div class="col-md-2">
                        <div>
                            <a class="form-control" role="button" id="add_involved" onclick="add_involded()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>

                                <tbody id='tbody_involved'>
                                    <tr>
                                        <td><input type="text" name="" id="" placeholder="Name" class="form-control"></td>
                                        <td><input type="text" name="" id="" placeholder="LastName" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    7. District: <input type="text" class="form-control" placeholder="" name="district">
                </div>
                <div>
                    8. Watershed: <input type="text" class="form-control" placeholder="" name="watershed">
                </div>
            </div>
        </div>
    </div>
    <!-- aqui termian la primera parte del formulario farmers register -->
    <div class="container">
        <div>
            <label for="farm_inf" class="Farm_inf"> II FARM INFORMATION</label>
            <div>
                1. How many parcel do you operate? <input type="text" class="form-control" placeholder="" name="parcel_num">
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div>
                        <a class="form-control" role="button" id="add_parcel" onclick="add_parcel()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Acreage</th>
                                    <th scope="col">Tenure</th>
                                    <th scope="col">Crop/Livestock</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_parcel'>
                                <tr>
                                    <td><input type="text" name="parc_num" id="" placeholder="" class="form-control"></td>
                                    <td><input type="text" name="parc_address" id="" placeholder="" class="form-control"></td>
                                    <td><input type="text" name="parc_acreage" id="" placeholder="" class="form-control"></td>
                                    <td><input type="text" name="parc_tenure" id="" placeholder="" class="form-control"></td>
                                    <td><input type="text" name="crop_livestock" id="" placeholder="" class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-check">2. What farm equipment do you own?>
            <div class="row">
                <div class="col-md-1">
                    <input class="form-check-input" type="checkbox" name="f_pump" id="f_pump">
                    <label class="form-check-label" for="pump"> Pump </label>
                </div>
                <div class="col-md-2">
                    <input class="form-check-input" type="checkbox" name="f_irri" id="f_irri">
                    <label class="form-check-label" for="f_irri"> Irrigation line </label>
                </div>
                <div class="col-md-2">
                    <input class="form-check-input" type="checkbox" name="f_other" id="f_other">
                    <label class="form-check-label" for="f_other"> Other </label>
                </div>
            </div>
        </div>
        <div>
            3. What are the the principal markets for your crop/livestock
        </div>
        <div class="container">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <div>
                            <a class="form-control" role="button" id="add_farm_crop" onclick="add_farm_crop()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Crop</th>
                                        <th scope="col">Market</th>
                                    </tr>
                                </thead>

                                <tbody id='tbody_parcel'>
                                    <tr>
                                        <td><input type="text" name="f_crop" id="" placeholder="" class="form-control"></td>
                                        <td><input type="text" name="f_market" id="" placeholder="" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <div>
                            <a class="form-control" role="button" id="add_farm_crop" onclick="add_farm_crop()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Livestock</th>
                                        <th scope="col">Market</th>
                                    </tr>
                                </thead>

                                <tbody id='tbody_parcel'>
                                    <tr>
                                        <td><input type="text" name="f_livestock" id="" placeholder="" class="form-control"></td>
                                        <td><input type="text" name="f_market" id="" placeholder="" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-check">4. Doyou go to the market or do middlemen come to your farm:
            <div class="row">
                Market:
                <div class="col-md-4">
                    <input class="form-check-input" type="radio" name="go_market" id="go_market">
                    <label class="form-check-label" for="go_market"> Yes </label>
                </div>
                <div class="col-md-6">
                    <input class="form-check-input" type="radio" name="go_market" id="go_market">
                    <label class="form-check-label" for="go_market"> No </label>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <div>
                            <a class="form-control" role="button" id="add_middle_name" onclick="add_middle_name()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Middleman name</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody_parcel'>
                                    <tr>
                                        <td><input type="text" name="m_name" id="" placeholder="" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-6">5. Who is/are your parcel (s) in boundary with?
                <div class="row">
                    <div class="col-md-2">
                        <div>
                            <a class="form-control" role="button" id="add_boundary" onclick="add_boundary()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Please list</th>
                                    </tr>
                                </thead>
                                <tbody id='tbody_parcel'>
                                    <tr>
                                        <td><input type="text" name="name_boundary" id="" placeholder="" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-check">
            <div class="col-md-3">
                <label class="form-check-label" for="boundary"> Tick if you unknow </label>
                <input class="form-check-input" type="checkbox" name="boundary" id="boundary">
            </div>
        </div>
        <div class="form-control">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>