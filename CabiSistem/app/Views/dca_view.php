<form>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">DCA FORM</label>
    </div>

    <div class="container">
        <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
            <!-- start input section -->
            <!-- esta parte debemos obtener de la tabla doctores de plantas -->
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Select or enter plant doctor name: </span>
                    <input list="plant_doctor_list" class="form-control" name="plant_doctor_name">
                    <datalist id="plant_doctor_list">

                    </datalist>

                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Clinic details </span>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="GDCAR1 Carriacou and Petit Martinic">GDCAR1 Carriacou and Petit Martinic</option>
                        <option value="GDCARF Carriacou field visit">GDCARF Carriacou field visit</option>
                        <option value="GDEAE1 Eastern Agricultural District">GDEAE1 Eastern Agricultural District</option>
                        <option value="GDEAEF Eastern Agricultural District Field Visit">GDEAEF Eastern Agricultural District Field Visit</option>
                        <option value="GDNAD1 (Northern Agricultural District)">GDNAD1 (Northern Agricultural District)</option>
                        <option value="GDNADF (Northern Agricultural District Field Visit)">GDNADF (Northern Agricultural District Field Visit)</option>
                        <option value="GDSAD1 Southern Agricultural District">GDSAD1 Southern Agricultural District</option>
                        <option value="GDSADF Southern Agricultural District Field Visit">GDSADF Southern Agricultural District Field Visit</option>
                        <option value="GDWAD1 Western Agricultural District">GDWAD1 Western Agricultural District</option>
                        <option value="GDWADF Western Agricultural District Field Visit">GDWADF Western Agricultural District Field Visit</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4>FARMER ABOUT THE FARMER</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-4">
                    <span class="input-group-text">Enter famer name: </span>
                    <input type="text" class="form-control" placeholder="Farmer name" name="f_name">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Phone number: </span>
                    <input type="text" class="form-control" placeholder="Phone number" name="f_phone">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Farmer ID: </span>
                    <input type="text" class="form-control" placeholder="Farmer id" name="f_id">
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Farmer sex: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex" value="Male">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex" value="Female" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Farmer age: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_age" value="Adult" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Adult
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_age" value="Senior">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Senior
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_age" value="Youth">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Youth
                        </label>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-4">
                    <span class="input-group-text"> County: </span>
                    <select name="f_county" id="county_list_id" class="form-control">
                        <option selected disabled>County Select</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <span class="input-group-text"> Sub - county: </span>
                    <select name="f_subcounty" id="sub_county_list_id" class="form-control">
                        <option selected disabled>Sub County Select (First Select County)</option>
                    </select>

                </div>
                <div class="col-md-4">
                    <span class="input-group-text"> Village: </span>
                    <select name="f_village" id="village_id" class="form-control">
                        <option selected disabled>Village Select (First Select Sub County)</option>
                    </select>

                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4>SAMPLE INFORMATION - VARIETY</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Select or enter crop: </span>
                    <!-- sacar de tabla crop y relacionar con variedad en la siguiente lista -->
                    <input type="hidden" name="id_crop_dca">
                    <input list="crop_dca" name="crop_dca" class="form-control" placeholder="Select Crop">
                    <datalist id="crop_dca">
                    </datalist>

                </div>
                <div class="col-md-6">
                    <!-- sacar de tabla variedady relacionar con crop de la tabla anterior -->
                    <span class="input-group-text">Select or enter Variety: </span>
                    <select class="form-select" aria-label="Default select example" name="variety">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4>SAMPLE INFORMATION - SAMPLE</h4>
            </div>

            <div class="row my-2">
                <div class="col-md-12">
                    <span class="input-group-text">Sample brought: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sample">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sample">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4>DEVELOPMENT STAGE</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Development stage: </span>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="dev_stage">
                                    Flowering
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="dev_stage">
                                    Fruiting
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="dev_stage">
                                    Intermediate
                                </label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="dev_stage">
                                    Mature
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="dev_stage">
                                    Post harvest
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="dev_stage">
                                    Seeding
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <span class="input-group-text"> Plant Part Afected: </span>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="pln_afected">
                                    Flower
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="pln_afected">
                                    Fruit/Grain
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="pln_afected">
                                    Leaf
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="pln_afected">
                                    Root/tuber
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="pln_afected">
                                    Seed
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="pln_afected">
                                    Stem/shot
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="pln_afected">
                                    Twig/branch
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label" for="pln_afected">
                                    Whole plant
                                </label>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4> AREA AFECTED</h4>
            </div>

            <div class="row my-2">
                <div class="col-md-3">
                    <span class="input-group-text">Year first seen </span>
                    <input type="number" min="1980" max="2030" step="1" value="2021" class="form-control" />
                </div>
                <div class="col-md-3">
                    <span class="input-group-text">Area planted: </span>
                    <input type="number" class="form-control" placeholder="area planted" name="area_planted">
                </div>
                <div class="col-md-3">

                    <span class="input-group-text">Unit </span>
                    <select class="form-select" aria-label="Default select example" name="Unit">
                        <option selected>Open this select menu</option>
                        <option value="Acres">Acres</option>
                        <option value="Hectares">Hectares</option>
                        <option value="m2">m2</option>
                        <option value="Plants">Plants</option>

                    </select>

                </div>
                <div class="col-md-3">

                    <span class="input-group-text">Percent of crop afeted </span>
                    <select class="form-select" aria-label="Default select example" name="percent">
                        <option selected>Open this select menu</option>
                        <option value="100%">100%</option>
                        <option value="75%">75%</option>
                        <option value="50%">50%</option>
                        <option value="25%">25%</option>
                        <option value="<25%">&lt;25% </option>
                    </select>

                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4>SYMPTOMS</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Describe only the major symptoms </span>
                    <select class="form-select" aria-label="Default select example" name="symptom">
                        <option selected>Open this select menu</option>
                        <option value="Blistered">Blistered</option>
                        <option value="Bore holes">Bore holes</option>
                        <option value="Chewed">Chewed</option>
                        <option value="Dieback">Dieback</option>
                        <option value="Distorted">Distorted</option>
                        <option value="Drying">Drying</option>
                        <option value="Frass">Frass</option>
                        <option value="Galls/sweellings">Galls/sweellings</option>
                        <option value="Insect seen">Insect seen</option>
                        <option value="Leaf fall">Leaf fall</option>
                        <option value="Leaf spot">Leaf spot</option>
                        <option value="Mite seen">Mite seen</option>
                        <option value="Mosaic">Mosaic</option>
                        <option value="No response">No response</option>
                        <option value="Pustule">Pustule</option>
                        <option value="Red">Red</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Symptom distribution </span>
                    <select class="form-select" aria-label="Default select example" name="sym_dist">
                        <option selected>Open this select menu</option>
                        <option value="Certain varieties">Certain varieties</option>
                        <option value="Even">Even</option>
                        <option value="Field margin">Field margin</option>
                        <option value="High areas">High areas</option>
                        <option value="Individual plants">Individual plants</option>
                        <option value="Linear">Linear</option>
                        <option value="Localised">Localised</option>
                        <option value="Low areas">Low areas</option>
                        <option value="Scattered">Scattered</option>
                        >
                    </select>
                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4> SYMPTOMS - DESCRIBE PROBLEM</h4>
            </div>

            <!-- sintomas -->
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Describe the problem </span>
                    <input type="text" class="form-control" placeholder="Describe problem" name="desc_problem">
                </div>

                <div class="col-md-6">
                    <span class="input-group-text">Type of problem: </span>
                    <div class="row" style="background-color: white; border: radius 20%;">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bacterium
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bird
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Fungus
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Insect
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mammal
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mite
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mollusc
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nematode
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nutrient deficiency
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Other
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Unknow
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Virus
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Water mould
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Weed
                                </label>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
            <!-- sintomas -->
            <hr>
            <div class="row my-2">
                <h4> DIAGNOSIS</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Diagnosis on: </span>
                    <input type="text" class="form-control" placeholder="Diagnosis on" name="diagnosis">
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Current control: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Cur_cnt">
                        <label class="form-check-label" for="cur_control">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Cur_cnt">
                        <label class="form-check-label" for="cur_control ">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4> RECOMENDATION / TYPE </h4>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Recomendation type </span>
                    <select class="form-select" aria-label="Default select example" name="rec_type">
                        <option selected>Open this select menu</option>
                        <option value="Biological">Biological</option>
                        <option value="Cultural">Cultural</option>
                        <option value="Fertilizer"> Fertilizer</option>
                        <option value="Fungicide">Fungicide</option>
                        <option value="Herbicide">Herbicide</option>
                        <option value="Insecticide/acaricide">Insecticide/acaricide</option>
                        <option value="Monitoring"> Monitoring</option>
                        <option value="Other">Other</option>
                        <option value="Resistant varieties">Resistant varieties</option>
                    </select>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Recomendation to manage the current problem </span>
                    <input type="text" class="form-control" placeholder="Phone number" name="f_phone">
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Recomendation to prevent this problem in future </span>
                    <input type="text" class="form-control" placeholder="Phone number" name="f_phone">
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-4">
                    <span class="input-group-text">Sample send to lab: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No`
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Fact sheet given: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No`
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Field visit arranged: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No`
                        </label>
                    </div>
                </div>
            </div>
            <!-- boton submit -->
            <div class="row my-4">
                <div class="d-grid gap-2 col-md-6 mx-auto">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>s