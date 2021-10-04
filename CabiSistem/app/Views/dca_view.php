<form id="dca_reg_form">
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">DCA FORM</label>
    </div>

    <div class="container">
        <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
            <!-- start input section -->
            <div class="row">
                <div class="offset-lg-1 col-lg-10">
                    <!-- Alert -->
                    <div class="alert alert-success d-none alert_dca" role="alert" id="alert_dca">

                    </div>
                    <!-- ///////// -->
                </div>
            </div>
            <!-- esta parte debemos obtener de la tabla doctores de plantas -->
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Select or enter plant doctor name: </span>
                    <input list="plant_doctor_list" class="form-control" name="id_plant_doc">
                    <datalist id="plant_doctor_list">

                    </datalist>

                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Clinic details </span>
                    <select class="form-select" aria-label="Default select example" name="cli_det">
                        <option selected>Open this select menu</option>
                        <option value="GDCAR1">GDCAR1 Carriacou and Petit Martinic</option>
                        <option value="GDCARF">GDCARF Carriacou field visit</option>
                        <option value="GDEAE1">GDEAE1 Eastern Agricultural District</option>
                        <option value="GDEAEF">GDEAEF Eastern Agricultural District Field Visit</option>
                        <option value="GDNAD1">GDNAD1 (Northern Agricultural District)</option>
                        <option value="GDNADF">GDNADF (Northern Agricultural District Field Visit)</option>
                        <option value="GDSAD1">GDSAD1 Southern Agricultural District</option>
                        <option value="GDSADF">GDSADF Southern Agricultural District Field Visit</option>
                        <option value="GDWAD1">GDWAD1 Western Agricultural District</option>
                        <option value="GDWADF">GDWADF Western Agricultural District Field Visit</option>
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
                    <input type="text" class="form-control" placeholder="Farmer name" name="farm_name_dca">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Phone number: </span>
                    <input type="text" class="form-control" placeholder="Phone number" name="phone_n_dca">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Farmer ID: </span>
                    <input type="text" class="form-control" placeholder="Farmer id" name="f_id_dca">
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Farmer sex: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex_dca" value="Male">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex_dca" value="Female" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Farmer age: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_age_dca" value="Adult" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Adult
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_age_dca" value="Senior">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Senior
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_age_dca" value="Youth">
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
                    <input list="crop_dca" name="id_crop" class="form-control" placeholder="Select Crop" id="crop_dca_list">
                    <datalist id="crop_dca">
                    </datalist>

                </div>
                <div class="col-md-6">
                    <!-- sacar de tabla variedady relacionar con crop de la tabla anterior -->
                    <span class="input-group-text">Select or enter Variety: </span>
                    <input list="list_dca_variety" class="form-select" placeholder="Select First Crop" name="id_variety" id="variety_dca">
                    <datalist id="list_dca_variety">

                    </datalist>


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
                        <input class="form-check-input" type="radio" name="sb_dca" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sb_dca" value="0">
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
                        <div class="col-md-6" id="development_stage1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Flowering" name="dev_stage">
                                <label class="form-check-label" for="dev_stage">
                                    Flowering
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fruiting" name="dev_stage">
                                <label class="form-check-label" for="dev_stage">
                                    Fruiting
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Intermediate" name="dev_stage">
                                <label class="form-check-label" for="dev_stage">
                                    Intermediate
                                </label>
                            </div>

                        </div>
                        <div class="col-md-6" id="development_stage2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mature" name="dev_stage">
                                <label class="form-check-label" for="dev_stage">
                                    Mature
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Post_harvest" name="dev_stage">
                                <label class="form-check-label" for="dev_stage">
                                    Post harvest
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Seeding" name="dev_stage">
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
                        <div class="col-md-6" id="plant_afect1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Flower" name="pp_afected">
                                <label class="form-check-label" for="pln_afected">
                                    Flower
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fruit/Grain" name="pp_afected">
                                <label class="form-check-label" for="pln_afected">
                                    Fruit/Grain
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Leaf" name="pp_afected">
                                <label class="form-check-label" for="pln_afected">
                                    Leaf
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Root/tuber" name="pp_afected">
                                <label class="form-check-label" for="pln_afected">
                                    Root/tuber
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6" id="plant_afect2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Seed" name="pp_afected">
                                <label class="form-check-label" for="pln_afected">
                                    Seed
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Stem/shot" name="pp_afected">
                                <label class="form-check-label" for="pln_afected">
                                    Stem/shot
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Twig/branch" name="pp_afected">
                                <label class="form-check-label" for="pln_afected">
                                    Twig/branch
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Whole_plant" name="pp_afected">
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
                    <input type="number" min="1980" max="2030" step="1" value="2021" class="form-control" name="yfs_dca" />
                </div>
                <div class="col-md-3">
                    <span class="input-group-text">Area planted: </span>
                    <input type="number" class="form-control" placeholder="area planted" name="area_planted">
                </div>
                <div class="col-md-3">

                    <span class="input-group-text">Unit </span>
                    <select class="form-select" aria-label="Default select example" name="unit_ap">
                        <option selected>Open this select menu</option>
                        <option value="Acres">Acres</option>
                        <option value="Hectares">Hectares</option>
                        <option value="m2">m2</option>
                        <option value="Plants">Plants</option>
                    </select>

                </div>
                <div class="col-md-3">

                    <span class="input-group-text">Percent of crop afeted </span>
                    <select class="form-select" aria-label="Default select example" name="per_cafected">
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
                    <div class="row">
                        <div class="col-md-6" id="symtoms_checkboxes1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Blistered" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Blistered
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Bore holes" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Bore holes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Chewed" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Chewed
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Dieback" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Dieback
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Leaf fall" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Leaf fall
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Leaf spot" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Leaf spot
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="No response" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    No response
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pustule" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Pustule
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6" id="symtoms_checkboxes2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Distorted" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Distorted
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Drying" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Drying
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Frass" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Frass
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Galls/sweellings" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Galls/sweellings
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Insect seen" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Insect seen
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mite seen" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Mite seen
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mosaic" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Mosaic
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Red" name="symtoms">
                                <label class="form-check-label" for="pln_afected">
                                    Red
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Symptom distribution </span>
                    <div class="row">
                        <div class="col-md-6" id="sym_dist_checkboxes1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Certain varieties" name="sym_dist">
                                <label class="form-check-label" for="pln_afected">
                                    Certain varieties
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Even" name="sym_dist">
                                <label class="form-check-label" for="pln_afected">
                                    Even
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Field margin" name="sym_dist">
                                <label class="form-check-label" for="pln_afected">
                                    Field margin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="High areas" name="sym_dist">
                                <label class="form-check-label" for="pln_afected">
                                    High areas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Scattered" name="sym_dist">
                                <label class="form-check-label" for="pln_afected">
                                    Scattered
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6" id="sym_dist_checkboxes2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Individual plants" name="sym_dist">
                                <label class="form-check-label" for="pln_afected">
                                    Individual plants
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Linear" name="sym_dist">
                                <label class="form-check-label" for="pln_afected">
                                    Linear
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Localised" name="sym_dist">
                                <label class="form-check-label" for="pln_afected">
                                    Localised
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Low areas" name="sym_dist">
                                <label class="form-check-label" for="pln_afected">
                                    Low areas
                                </label>
                            </div>

                        </div>
                    </div>

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
                    <textarea name="desc_problem" rows="6" cols="50" placeholder="Describe problem" class="form-control"></textarea>
                    <!-- <input type="text" class="form-control" placeholder="Describe problem" name="desc_problem"> -->
                </div>

                <div class="col-md-6">
                    <span class="input-group-text">Type of problem: </span>
                    <div class="row" style="background-color: white; border: radius 20%;">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Bacterium">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bacterium
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Bird">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bird
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Fungus">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Fungus
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Insect">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Insect
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Mammal">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mammal
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Mite">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mite
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Mollusc">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mollusc
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Nematode">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nematode
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Nutrient deficiency">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nutrient deficiency
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Other">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Other
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Unknow">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Unknow
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Virus">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Virus
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Water mould">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Water mould
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Weed">
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
                        <input class="form-check-input" type="radio" name="Cur_cnt" value="1">
                        <label class="form-check-label" for="cur_control">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Cur_cnt" value="0">
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
                    <div class="row">
                        <div class="col-md-6" id="recomendationType_checkboxes1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Biological" name="rec_type">
                                <label class="form-check-label" for="pln_afected">
                                    Biological
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Cultural" name="rec_type">
                                <label class="form-check-label" for="pln_afected">
                                    Cultural
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fertilizer" name="rec_type">
                                <label class="form-check-label" for="pln_afected">
                                    Fertilizer
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fungicide" name="rec_type">
                                <label class="form-check-label" for="pln_afected">
                                    Fungicide
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Resistant varieties" name="rec_type">
                                <label class="form-check-label" for="pln_afected">
                                    Resistant varieties
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6" id="recomendationType_checkboxes2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Herbicide" name="rec_type">
                                <label class="form-check-label" for="pln_afected">
                                    Herbicide
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Insecticide/acaricide" name="rec_type">
                                <label class="form-check-label" for="pln_afected">
                                    Insecticide/acaricide
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Monitoring" name="rec_type">
                                <label class="form-check-label" for="pln_afected">
                                    Monitoring
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Other" name="rec_type">
                                <label class="form-check-label" for="pln_afected">
                                    Other
                                </label>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Recomendation to manage the current problem </span>
                    <input type="text" class="form-control" placeholder="Manage current problem" name="rec_curp">
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Recomendation to prevent this problem in future </span>
                    <input type="text" class="form-control" placeholder="Prevent this problem in future" name="rec_prevp">
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-4">
                    <span class="input-group-text">Sample send to lab: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="s_tolab" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="s_tolab" value="0" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Fact sheet given: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sheet_giv" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sheet_giv" value="0" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Field visit arranged: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="field_v" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="field_v" value="0" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <!-- boton submit -->
            <div class="row">
                <div class="offset-lg-1 col-lg-10">
                    <!-- Alert -->
                    <div class="alert alert-success d-none alert_dca" role="alert">

                    </div>
                    <!-- ///////// -->
                </div>
            </div>
            <div class="row my-4">
                <div class="d-grid gap-2 col-md-6 mx-auto">
                    <button type="submit" class="btn btn-success" id="btn_dca_form">
                        <span class="spinner-border spinner-border-sm d-none spin_dca" role="status" aria-hidden="true"></span>
                        <span class="d-none spin_dca">Loading...<br></span>
                        <span class="d-none spin_dca"> Please Wait</span>
                        <span class="not_spin_dca"> Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>